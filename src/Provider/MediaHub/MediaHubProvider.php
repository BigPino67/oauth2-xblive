<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\MediaHub;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class MediaHubProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiMediaHub = "https://mediahub.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getScreenshots(string $titleId = "", int $skip = 0, int $max = 25, String $continuationToken = "")
    {
        return $this->getMediaByXuid("screenshots", $this->XstsToken->getXstsXuid(), $titleId, $skip, $max, $continuationToken);
    }

    public function getScreenshotsByXuid(string $xuid, string $titleId = "", int $skip = 0, int $max = 25, String $continuationToken = "")
    {
        return $this->getMediaByXuid("screenshots", $xuid, $titleId, $skip, $max, $continuationToken);
    }

    public function getGameClips(string $titleId = "", int $skip = 0, int $max = 25, String $continuationToken = "")
    {
        return $this->getMediaByXuid("gameclips", $this->XstsToken->getXstsXuid(), $titleId, $skip, $max, $continuationToken);
    }

    public function getGameClipsByXuid(string $xuid, string $titleId = "", int $skip = 0, int $max = 25, String $continuationToken = "")
    {
        return $this->getMediaByXuid("gameclips", $xuid, $titleId, $skip, $max, $continuationToken);
    }

    private function getMediaByXuid(string $target, string $xuid, string $titleId = "", int $skip = 0, int $max = 25, String $continuationToken = "")
    {
        $requestUrl = $this->urlXBLiveApiMediaHub . "/".$target."/search";

        $query = "OwnerXuid eq ".$xuid;
        if($titleId != null && $titleId != ""){
            $query .= " and titleId eq ".$titleId;
        }

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "2",
            ],

            "body" => json_encode([
                "skip" => $skip,
                "max" => $max,
                "continuationToken" => $continuationToken,
                "query" => $query,
            ])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
