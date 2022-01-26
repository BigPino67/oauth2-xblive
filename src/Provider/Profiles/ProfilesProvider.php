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

    public function __construct(XBLiveXstsToken $xstsToken)
    {
        parent::__construct();
        $this->XstsToken = $xstsToken;
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
                "settings" => ["GameDisplayName", "GameDisplayPicRaw", "Gamerscore", "Gamertag"]
            ])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        return (new ProfilesResponse($response))->getProfileUsers()[0];
    }
}
