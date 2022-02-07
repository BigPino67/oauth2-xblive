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

    public function getTitleHistory(string $language = "en", int $maxItems = 5)
    {
        $queryParams = [
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiTitleHub . "/users/xuid(".$this->XstsToken->getXstsXuid().")/titles/titlehistory/decoration/achievement,image,scid?";
        $requestUrl .= http_build_query($queryParams);

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

    public function getTitleInfo(string $titleId, string $language = "en")
    {
        $requestUrl = $this->urlXBLiveApiTitleHub . "/users/xuid(".$this->XstsToken->getXstsXuid().")/titles/titleid(".$titleId.")/decoration/achievement,alternateTitleId,detail,image,scid";

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
