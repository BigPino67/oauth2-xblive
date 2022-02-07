<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Activity;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class ActivityProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiSocial = "https://avty.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getXboxActivityFeed(int $maxItems = 15)
    {
        $startDatetime  =  new \DateTime('now');
        $startDatetime->modify("-1 day");
        $startDatetime->setTimezone(new \DateTimeZone('UTC'));

        $queryParams = [
            "numItems" => $maxItems,
            "includeSelf" => true,
            "startDateTime" => $startDatetime->format("Y-m-dTH:i:s.vZ"),
            "activityTypes" => "Ballot;GameDVR;UserPost;Screenshot;UserPost;TextPost",
            "scope" => "friends",
        ];

        $requestUrl = $this->urlXBLiveApiSocial . "/users/me/XboxFeed?";
        $requestUrl .= http_build_query($queryParams);

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

    public function getPersonnalActivityFeed(int $maxItems = 20)
    {
        $queryParams = [
            "numItems" => $maxItems,
            "activityTypes" => "Achievement;GameDVR;LegacyAchievement;Screenshot",
        ];

        $requestUrl = $this->urlXBLiveApiSocial . "/users/me/Activity/History/UnShared?";
        $requestUrl .= http_build_query($queryParams);

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

    public function getPersonnalRecentClipsFromActivityFeed(int $maxItems = 20)
    {
        $queryParams = [
            "numItems" => $maxItems,
            "activityTypes" => "GameDVR",
        ];

        $requestUrl = $this->urlXBLiveApiSocial . "/users/me/Activity/History/UnShared?";
        $requestUrl .= http_build_query($queryParams);

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
}
