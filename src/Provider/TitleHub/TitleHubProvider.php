<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\TitleHub;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class TitleHubProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiTitleHub= "https://titlehub.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getTitleHistory(string $language = "en", int $maxItems = 50)
    {
        //TODO: response object;
        return $this->getTitleHistoryByXuid($this->XstsToken->getXstsXuid(), $language, $maxItems);
    }

    public function getTitleHistoryByXuid(string $xuid, string $language = "en", int $maxItems = 50)
    {
        $queryParams = [
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiTitleHub . "/users/xuid(".$xuid.")/titles/titlehistory/decoration/GamePass,TitleHistory,Achievement,Stats,image,scid";
        if($maxItems > 0)
            $requestUrl .= "?".http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
                "Accept-Language" => $language,
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getPublicTitleHistory(string $language = "en", int $maxItems = 50)
    {
        //TODO: response object;
        return $this->getPublicTitleHistoryByXuid($this->XstsToken->getXstsXuid(), $language, $maxItems);
    }

    public function getPublicTitleHistoryByXuid(string $xuid, string $language = "en", int $maxItems = 50)
    {
        $queryParams = [
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiTitleHub . "/users/xuid(".$xuid.")/titles/titlehistory/decoration/GamePass,TitleHistory,Achievement,Stats,image,scid";
        if($maxItems > 0)
            $requestUrl .= "?".http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
                "Accept-Language" => $language,
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);



        $titles = array();
        for($i=0; $i<count($response["titles"]); $i++)
        {
            if($response["titles"][$i]["titleHistory"]["canHide"] === false || $response["titles"][$i]["stats"]["sourceVersion"] == 3)
                array_push($titles , $response["titles"][$i]);
        }
        $response["titles"] = $titles;

        //TODO: response object;
        return $response;
    }

    public function getTitleInfo(string $titleId, string $language = "en")
    {
        //TODO: response object;
        return $this->getTitleInfoByXuid($this->XstsToken->getXstsXuid(), $titleId, $language);
    }

    public function getTitleInfoByXuid(string $xuid, string $titleId, string $language = "en")
    {
        $requestUrl = $this->urlXBLiveApiTitleHub . "/users/xuid(".$xuid.")/titles/titleid(".$titleId.")/decoration/achievement,alternateTitleId,detail,image,scid";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
                "Accept-Language" => $language,
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
