<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\PeopleHub;


use BigPino67\OAuth2\XBLive\Client\Enum\FriendTypeEnum;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use League\OAuth2\Client\Grant\AbstractGrant;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveProfileUsers;
use BigPino67\OAuth2\XBLive\Client\Provider\Exception\XBLiveIdentityProviderException;
use BigPino67\OAuth2\XBLive\Client\Token\AccessToken;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXasuToken;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;
use BigPino67\OAuth2\XBLive\Client\Provider\Enum\XboxOneTitleEnum;

class PeopleHubProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $uriXBLiveApiPeople = "https://peoplehub.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getCurrentProfile(String $language = "en")
    {
        //TODO: Return objet response
        return $this->getProfileByXuid($this->XstsToken->getXstsXuid(), $language);
    }

    public function getProfileByXuid(string $xuid, string $language = "en")
    {
        $ownerId = "xuids(".$xuid.")";
        //TODO: Return objet response
        return $this->getProfile($ownerId, $language);
    }

    public function getProfileLinkedAccounts(String $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/accountlink";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "1",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    public function getFriends(FriendTypeEnum $friendTypeEnum, string $language = "en")
    {
        $response = null;
        if($friendTypeEnum == FriendTypeEnum::All)
            $response = $this->getFriendsAll($language);
        elseif ($friendTypeEnum == FriendTypeEnum::Friends)
            $response = $this->getFriendsOnly($language);
        elseif ($friendTypeEnum == FriendTypeEnum::FollowedPeople)
            $response = $this->getFollowedPeople($language);
        return $response;
    }

    private function getFriendsAll(string $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/social/decoration/detail,broadcast,multiplayersummary,preferredcolor,socialManager,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "1",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    private function getFriendsOnly(string $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/friends/decoration/detail,broadcast,multiplayersummary,preferredcolor,socialManager,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "7",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    private function getFollowedPeople(string $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/social/decoration/detail,broadcast,multiplayersummary,preferredcolor,socialManager,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "7",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    public function getFollowers(string $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/followers/decoration/detail,broadcast,multiplayersummary,preferredcolor,socialManager,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "7",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    public function getFriendsBatch(array $xuids = [], string $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/batch/decoration/broadcast,multiplayersummary,preferredcolor,socialManager,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "1",
                "Accept-Language" => $language
            ],
            "body" => json_encode([
                "xuids" => $xuids,
            ])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    public function getUserXuidFriends(string $xuid, string $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/xuid(".$xuid.")/people/social/decoration/broadcast,multiplayersummary,preferredcolor,socialManager,tournamentSummary,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "1",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    public function getRecentPlayers(String $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/xuid(".$this->XstsToken->getXstsXuid().")/people/recentplayers";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "2",
                "Content-Type" => "application/json",
                "Accept-Language" => $language
            ],
            "body" => json_encode([])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    public function getRecommendedPeople(String $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/recommendations";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "1",
                "Content-Type" => "application/json",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }

    private function getProfile(String $ownerId, String $language = "en")
    {
        $requestUrl = $this->uriXBLiveApiPeople . "/users/me/people/".$ownerId."/decoration/detail,broadcast,multiplayersummary,preferredcolor,socialManager,tournamentSummary,presenceDetail";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "7",
                "Accept-Language" => $language
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: Return objet response
        return ($response);
    }
}
