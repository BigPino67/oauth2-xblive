<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Screenshots;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class ScreenshotsProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiScreenshots = "https://screenshotsmetadata.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getRecentScreenshots(string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiScreenshots . "/users/me";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/screenshots?";
        $requestUrl .= http_build_query($queryParams);

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getSavedScreenshots(string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiScreenshots . "/users/me";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/screenshots/saved?";
        $requestUrl .= http_build_query($queryParams);

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getRecentScreenshotsByXuid(string $xuid, string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiScreenshots . "/users/xuid(".$xuid.")";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/screenshots?";
        $requestUrl .= http_build_query($queryParams);

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getSavedScreenshotsByXuid(string $xuid, string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiScreenshots . "/users/xuid(".$xuid.")";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/screenshots/saved?";
        $requestUrl .= http_build_query($queryParams);

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
