<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Accounts;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class AccountsProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiAccounts = "https://accounts.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getFamilyMembers(string $language = "en")
    {
        $requestUrl = $this->urlXBLiveApiAccounts . "/family/memberXuid(".$this->XstsToken->getXstsXuid().")";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "x-xbl-contract-version" => "3",
                "Accept-Language" => $language,
            ]
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
