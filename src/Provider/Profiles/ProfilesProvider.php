<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Profiles;


use BigPino67\OAuth2\XBLive\Client\Provider\Profiles\Response\ProfilesResponse;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class ProfilesProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiProfile = "https://profile.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getCurrentProfile()
    {
        $queryParams = [
            "settings" => "GameDisplayPicRaw,Gamerscore,Gamertag,AccountTier,XboxOneRep,PreferredColor,RealName,Bio,TenureLevel,Watermarks,Location,IsDeleted,ShowUserAsAvatar"
        ];

        $requestUrl = $this->urlXBLiveApiProfile . "/users/xuid(".$this->XstsToken->getXstsXuid().")/profile/settings?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }

    public function getLoggedUserProfile()
    {
        $requestUrl = $this->urlXBLiveApiProfile . "/users/batch/profile/settings";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
            ],
            "body" => json_encode([
                "userIds" => [$this->XstsToken->getXstsXuid()],
                "settings" => ["GameDisplayName", "GameDisplayPicRaw", "Gamerscore", "Gamertag", "AccountTier", "XboxOneRep", "PreferredColor","RealName","Bio","TenureLevel","Watermarks","Location","IsDeleted","ShowUserAsAvatar"]
            ])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        return (new ProfilesResponse($response))->getProfileUsers()[0];
    }



    public function searchProfileByGamerTag(string $gamertag)
    {

        $queryParams = [
            "settings" => "GameDisplayPicRaw,Gamerscore,Gamertag,AccountTier,XboxOneRep,PreferredColor,RealName,Bio,TenureLevel,Watermarks,Location,IsDeleted,ShowUserAsAvatar"
        ];

        $requestUrl = $this->urlXBLiveApiProfile . "/users/gt(".$gamertag.")/profile/settings?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
            ],
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return (new ProfilesResponse($response))->getProfileUsers()[0];
    }

    public function searchProfileByXuid(string $xuid)
    {

        $queryParams = [
            "settings" => "GameDisplayPicRaw,Gamerscore,Gamertag,AccountTier,XboxOneRep,PreferredColor,RealName,Bio,TenureLevel,Watermarks,Location,IsDeleted,ShowUserAsAvatar"
        ];

        $requestUrl = $this->urlXBLiveApiProfile . "/users/xuid(".$xuid.")/profile/settings?";
        $requestUrl .= http_build_query($queryParams);

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
            ],
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        return (new ProfilesResponse($response))->getProfileUsers()[0];
    }
}
