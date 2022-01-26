<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;


use League\OAuth2\Client\Grant\AbstractGrant;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;
use BigPino67\OAuth2\XBLive\Client\Provider\Exception\XBLiveIdentityProviderException;
use BigPino67\OAuth2\XBLive\Client\Token\AccessToken;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXasuToken;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

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
	private $uriXBLiveApiSocial = "https://social.xboxlive.com";
	private $uriXBLiveApiPeople = "https://peoplehub.xboxlive.com";
	private $uriXBLiveApiMultiplayer = "https://multiplayeractivity.xboxlive.com";

    public $scope = ['XboxLive.signin', 'XboxLive.offline_access'];

    public $scopeSeparator = ' ';
	
	public $defaultXboxLiveLoginHeaders = ["x-xbl-contract-version" => "1", "Content-Type" => "application/json"];
	public $defaultXboxLiveApiQueryHeaders = ["Authorization" => "", "x-xbl-contract-version" => "2", "Content-Type" => "application/json"];
	public $defaultSandboxId = "RETAIL";


    public function __construct(array $options = [], array $collaborators = [])
    {
        parent::__construct($options, $collaborators);
    }
	
	/*MustImplement*/
    public function getBaseAuthorizationUrl()
    {
		//https://docs.microsoft.com/en-us/advertising/guides/authentication-oauth-live-connect?view=bingads-13#request-userconsent
        return $this->urlLogin.'/oauth20_authorize.srf';
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
        $logoutUri = $this->urlLogin.'/oauth20_logout.srf?';
		
		$queryParams = array(
			"client_id" => $this->clientId
		);

        if (!empty($this->logoutRedirectUri)) {
			$queryParams["redirect_uri"] = $this->logoutRedirectUri;
        }

        return $logoutUri . http_build_query($queryParams);
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
