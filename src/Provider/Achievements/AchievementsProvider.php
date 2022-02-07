<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements;


use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Enum\XboxOneTitleEnum;
use BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Response\AchievementsResponse;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class AchievementsProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $uriXBLiveApiAchievements = "https://achievements.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getAchievements(string $titleId = "", int $maxItems = 20, String $continuationToken = "")
    {
        $queryParams = array();
        if($titleId != null && $titleId != "" && XboxOneTitleEnum::isValidValue($titleId))
        {
            $queryParams["titleId"] = $titleId;
        }
        $queryParams["continuationToken"] = $continuationToken;
        $queryParams["maxItems"] = $maxItems;

        $requestUrl = $this->uriXBLiveApiAchievements . "/users/xuid(".$this->XstsToken->getXstsXuid().")/achievements?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
            ],
            "body" => json_encode([])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return new AchievementsResponse($response);
    }
}
