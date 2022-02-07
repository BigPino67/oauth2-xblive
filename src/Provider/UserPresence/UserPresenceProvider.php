<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\UserPresence;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class UserPresenceProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiUserPresence = "https://userpresence.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getUserPresence()
    {
        $requestUrl = $this->urlXBLiveApiUserPresence . "/users/me?level=all";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "3",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getUserPresenceByXuid(string $xuid)
    {
        $requestUrl = $this->urlXBLiveApiUserPresence . "/users/xuid(".$xuid.")?level=all";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getUserPresenceBatch(array $xuids = [])
    {
        $requestUrl = $this->urlXBLiveApiUserPresence . "/users/batch?level=all";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "3",
            ],
            "body" => json_encode([
                "level" => "all",
                "users" => $xuids,
            ])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
