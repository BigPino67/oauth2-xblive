<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\GameClips;

use BigPino67\OAuth2\XBLive\Client\Enum\XboxOneTitleEnum;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class GameClipsProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiGameClips = "https://gameclipsmetadata.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getRecentClips(string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiGameClips . "/users/me";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/clips?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "1",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getSavedClips(string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiGameClips . "/users/me";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/clips/saved?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "1",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getRecentClipsByXuid(string $xuid, string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiGameClips . "/users/xuid(".$xuid.")";
        
        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/clips?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "1",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getSavedClipsByXuid(string $xuid, string $titleId = "", int $skipItems = 0, int $maxItems = 25)
    {
        $queryParams = [
            "skipItems" => $skipItems,
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiGameClips . "/users/xuid(".$xuid.")";

        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            //Not working as expected
            //$requestUrl .= "/titles/".$titleId;
        }
        $requestUrl .= "/clips/saved?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "1",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
