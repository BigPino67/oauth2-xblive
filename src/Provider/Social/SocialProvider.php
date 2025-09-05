<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Social;

use BigPino67\OAuth2\XBLive\Client\Provider\Social\Response\SocialResponse;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class SocialProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiSocial = "https://social.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getSummary()
    {
        $requestUrl = $this->urlXBLiveApiSocial . "/users/me/summary";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return new SocialResponse($response);
    }

    public function getPeople()
    {
        $requestUrl = $this->urlXBLiveApiSocial . "/users/me/people";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return $response;
    }

    public function getSummaryByXuid(string $xuid)
    {
        $requestUrl = $this->urlXBLiveApiSocial . "/users/xuid(".$xuid.")/summary";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return new SocialResponse($response);
    }

    public function getSummaryByGamertag(string $gamertag)
    {
        $requestUrl = $this->urlXBLiveApiSocial . "/users/gt(".$gamertag.")/summary";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return new SocialResponse($response);
    }
}
