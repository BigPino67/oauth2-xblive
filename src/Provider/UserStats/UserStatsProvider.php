<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\UserStats;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class UserStatsProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiUserStats = "https://userstats.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getStatistics(string $scid)
    {
        $requestUrl = $this->urlXBLiveApiUserStats . "/users/xuid(".$this->XstsToken->getXstsXuid().")/scids/".$scid."/stats/MinutesPlayed";

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

    public function getStatisticsWithMetadata(string $scid)
    {
        $queryParams = [
            "include" => "valuemetadata"
        ];

        $requestUrl = $this->urlXBLiveApiUserStats . "/users/xuid(".$this->XstsToken->getXstsXuid().")/scids/".$scid."/stats/MinutesPlayed?";
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
