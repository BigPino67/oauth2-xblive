<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\PeopleHub;


use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
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
use BigPino67\OAuth2\XBLive\Client\Provider\Enum\XboxOneTitleEnum;

class PeopleHubProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $uriXBLiveApiPeople = "https://peoplehub.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken)
    {
        parent::__construct();
        $this->XstsToken = $xstsToken;
    }

    public function getRecentPlayers(String $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/xuid(".$this->XstsToken->getXstsXuid().")/people/recentplayers";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
                "Accept-Language" => $language
            ],
            "body" => json_encode([])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }
}
