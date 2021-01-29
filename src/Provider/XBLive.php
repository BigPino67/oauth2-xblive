<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;


use League\OAuth2\Client\Grant\AbstractGrant;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveProfileUsers;
use BigPino67\OAuth2\XBLive\Client\Provider\Exception\XBLiveIdentityProviderException;
use BigPino67\OAuth2\XBLive\Client\Token\AccessToken;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXasuToken;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;
use BigPino67\OAuth2\XBLive\Client\Provider\Enum\XBLivePlatformEnum;
use BigPino67\OAuth2\XBLive\Client\Provider\Enum\XboxOneTitleEnum;

class XBLive extends AbstractProvider
{
    use BearerAuthorizationTrait;
	
	public $logoutRedirectUri = "";
	
	/*Microsoft Live Login URIs*/
    public $urlLogin = 'https://login.live.com';
	
	/*XBOX Live Login URIs*/
	public $urlUserAuthenticate = 'https://user.auth.xboxlive.com/user/authenticate';
    public $urlXSTSAuthorize = 'https://xsts.auth.xboxlive.com/xsts/authorize';
    public $urlAuthRelyingParty = 'http://auth.xboxlive.com';
    public $urlXboxRelyingParty = 'http://xboxlive.com';
    public $urlDefaultSiteName = 'user.auth.xboxlive.com';
	
	/*XBOX Live API URIs*/
	private $urlXBLiveApiProfile = "https://profile.xboxlive.com";
	private $uriXBLiveApiAchievements = "https://achievements.xboxlive.com";

    public $scope = ['XboxLive.signin', 'XboxLive.offline_access'];

    public $scopeSeparator = '+';
	
	public $defaultXboxLiveLoginHeaders = ["x-xbl-contract-version" => "1", "Content-Type" => "application/json"];
	public $defaultXboxLiveApiQueryHeaders = ["Authorization" => "", "x-xbl-contract-version" => "2", "Content-Type" => "application/json"];
	public $defaultSandboxId = "RETAIL";


    public function __construct(array $options = [], array $collaborators = [])
    {
		/*if (isset($options['logoutRedirectUri'])) {
            $this->logoutRedirectUri = $options['logoutRedirectUri'];
        }*/
		
        parent::__construct($options, $collaborators);
    }
	
	/*MustImplement*/
    public function getBaseAuthorizationUrl()
    {
		//https://docs.microsoft.com/en-us/advertising/guides/authentication-oauth-live-connect?view=bingads-13#request-userconsent
		
		$loginUri = $this->urlLogin.'/oauth20_authorize.srf';
		$loginUri .= '?client_id='.$this->clientId;
		$loginUri .= '&scope='.implode($this->scopeSeparator, $this->scope);
		$loginUri .= '&response_type=code';
		$loginUri .= '&redirect_uri='.urlencode($this->redirectUri);
		$loginUri .= '&response_mode=form_post';
		$loginUri .= '&state='.$this->state;
        return $loginUri;
    }
	
	/*MustImplement*/
    public function getBaseAccessTokenUrl(array $params)
    {
        return $this->urlLogin.'/oauth20_token.srf';
    }
	
	/*MustImplement*/
    public function getResourceOwnerDetailsUrl(\League\OAuth2\Client\Token\AccessToken $token)
    {
		return null;
    }
	
	/*MustImplement*/
    protected function getDefaultScopes()
    {
        return $this->scope;
    }
	
	/*MustImplement*/
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() >= 400) {
			
            throw XBLiveIdentityProviderException::clientException($response, $data);
        }
    }
	
	/*MustImplement*/
	protected function createResourceOwner(array $response, \League\OAuth2\Client\Token\AccessToken $token)
    {
        return null;
    }

	public function getLogoutUrl()
    {
        $logoutUri = $this->urlLogin.'/oauth20_logout.srf';
        $logoutUri .= '?client_id='.$this->clientId;

        if (!empty($this->logoutRedirectUri)) {
            $logoutUri .= '?redirect_uri=' . urlencode($this->logoutRedirectUri);
        }

        return $logoutUri;
    }
	
	public function getXasuToken($token)
    {
		$requestOptions = [
			"headers" => $this->defaultXboxLiveLoginHeaders,
			"body" => json_encode([
				"RelyingParty" => $this->urlAuthRelyingParty,
				"TokenType" => "JWT",
				"Properties" => [
					"AuthMethod" => "RPS",
					"SiteName" => $this->urlDefaultSiteName,
					"RpsTicket" => "d=".$token->getToken()."token_type=".$token->getValues()["token_type"]."&expires_in=".$token->getExpiresIn()."&scope=".$token->getValues()["scope"]."&user_id=".$token->getValues()["user_id"]
				]
			])
		];

		$response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $this->urlUserAuthenticate, $requestOptions);
		
		return new XBLiveXasuToken($response);
    }
	
	public function getXstsToken($xasuToken)
    {
		$requestOptions = [
			"headers" => $this->defaultXboxLiveLoginHeaders,
			"body" => json_encode([
				"RelyingParty" => $this->urlXboxRelyingParty,
				"TokenType" => "JWT",
				"Properties" => [
					"UserTokens" => array($xasuToken->getToken()),
					"SandboxId" => $this->defaultSandboxId
				]
			])
		];

		$response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $this->urlXSTSAuthorize, $requestOptions);
		
		return new XBLiveXstsToken($response);
    }
	
	protected function getXboxLiveApiQueryHeaders(\BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken $xstsToken)
	{
		$this->defaultXboxLiveApiQueryHeaders["Authorization"] = $xstsToken->getAuthorizationHeader();
		return $this->defaultXboxLiveApiQueryHeaders;
	}
	
	public function getLoggedUserProfile(\BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken $xstsToken)
    {
		$requestUrl = $this->urlXBLiveApiProfile . "/users/batch/profile/settings";
		
        $requestOptions = [
			"headers" => $this->getXboxLiveApiQueryHeaders($xstsToken),
			"body" => json_encode([
				"userIds" => [$xstsToken->getXstsXuid()],
				"settings" => ["GameDisplayName", "GameDisplayPicRaw", "Gamerscore", "Gamertag"]
			])
		];

		$response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);
		
		return (new XBLiveProfileUsers($response))->getProfileUsers()[0];
    }
	
	public function getAchievements(\BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken $xstsToken, $titleId = null, $continuationToken = "", $maxItems = 20)
    {
		
		$queryParams = array();
		if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
		{
			$queryParams["titleId"] = $titleId;
		}
		$queryParams["continuationToken"] = $continuationToken;
		$queryParams["maxItems"] = $maxItems;
		
		$requestUrl = $this->uriXBLiveApiAchievements . "/users/xuid(".$xstsToken->getXstsXuid().")/achievements?";
		$requestUrl .= http_build_query($queryParams);
		
        $requestOptions = [
			"headers" => $this->getXboxLiveApiQueryHeaders($xstsToken),
			"body" => json_encode([])
		];

		$response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);
		
		return new XBLiveAchievementsResponse($response);
	}
	
	public function printLoggedUserListOfTitleIds(\BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken $xstsToken, $platform = null)
    {
		$requestUrl = $this->uriXBLiveApiAchievements . "/users/xuid(".$xstsToken->getXstsXuid().")/achievements?maxItems=2000000";
		
        $requestOptions = [
			"headers" => $this->getXboxLiveApiQueryHeaders($xstsToken),
			"body" => json_encode([])
		];

		$response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);
		
		if($platform == null || !XBLivePlatformEnum::isValidName($platform))
			$platform = XBLivePlatformEnum::All;
		
		$list = array();
		for($i=0; $i<count($response["achievements"]); $i++)
		{
			$achi = $response["achievements"][$i]["titleAssociations"][0];
			$platforms = $response["achievements"][$i]["platforms"];
			
			$isPlatformRequested = false;
			if($platform == XBLivePlatformEnum::All)
			{
				$isPlatformRequested = true;
			}
			else
			{
				for($j=0; $j<count($platforms); $j++)
				{
					if($platforms[$j] == "XboxOne"){
						$isPlatformRequested = true;
						break;
					}	
				}
			}
			
			
			if(!$isPlatformRequested)
				continue;
			
			if(!array_key_exists($achi["id"], $list))
			{
				$name = str_replace(" ", "", ucwords($achi["name"]));
				//$name = str_replace("-", "", $name);
				$name = str_replace(":", "_", $name);
				$list[$achi["id"]] = array(
					"id" => $achi["id"],
					"name" => $name);
			}
		}
		usort($list, function ($item1, $item2) {
			return $item1["name"] <=> $item2["name"];
		});
		
		

		$php = "<?php\r\n";
		$php .= "namespace BigPino67\OAuth2\\XBLive\Client\Provider\Enum;\r\n";
		$php .= "\r\n";
		$php .= "use BigPino67\OAuth2\\XBLive\Client\Provider\Enum\BasicEnum;\r\n";
		$php .= "\r\n";
		$php .= "abstract class XboxOneTitleEnum extends BasicEnum {\r\n";
		for($i=0; $i<count($list); $i++)
		{
			$php .= '    const '.$list[$i]["name"].' = '.$list[$i]["id"].";\r\n";
		}
		$php .= "}\r\n";
		$php .= "?>\r\n";
		
		echo '<textarea type="text"  name="txtarea" style="font-family: Arial;font-size: 12pt;width:100%;height:100vw">'.($php).'</textarea>';
    }
	
	protected function fetchXBLiveTokensDetails($method, $url, array $options = [])
    {
		$factory = $this->getRequestFactory();

        $request = $factory->getRequestWithOptions($method, $url, $options);
		
        $response = $this->getParsedResponse($request);
		
		

        if (false === is_array($response)) {
            throw new UnexpectedValueException(
                'Invalid response received from Authorization Server. Expected JSON.'
            );
        }

        return $response;
    }

    public function getClientId()
    {
        return $this->clientId;
    }
	
    public function getState()
    {
        return $this->state;
    }

    protected function getScopeSeparator()
    {
        return $this->scopeSeparator;
    }

    protected function createAccessToken(array $response, AbstractGrant $grant)
    {
        return new AccessToken($response, $this);
    }
}
