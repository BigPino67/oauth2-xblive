<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Messages;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class MessagesProvider extends XBLive
{
	/*XBOX Live API URI for this provider*/
	private $urlXBLiveApiXblMessages = "https://xblmessaging.xboxlive.com";

    private XBLiveXstsToken $XstsToken;

    public function __construct(XBLiveXstsToken $xstsToken, array $collaborators = [])
    {
        parent::__construct([], $collaborators);
        $this->XstsToken = $xstsToken;
    }

    public function getInbox()
    {
        $requestUrl = $this->urlXBLiveApiXblMessages . "/network/Xbox/users/me/inbox";

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

    public function getConversationWithXuid(string $recipientXuid, int $maxItems = 100)
    {
        $queryParams = [
            "maxItems" => $maxItems,
        ];

        $requestUrl = $this->urlXBLiveApiXblMessages . "/network/Xbox/users/me/conversations/users/xuid(".$recipientXuid.")?";
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

    public function sendMessageToXuid(string $recipientXuid, $message = "")
    {
        $requestUrl = $this->urlXBLiveApiXblMessages . "/network/xbox/users/xuid(".$this->XstsToken->getXstsXuid().")/conversations/users/xuid(".$recipientXuid.")";

        $requestOptions = [
            "headers" => [
                "Authorization" => $this->XstsToken->getAuthorizationHeader(),
                "Content-Type" => "application/json; charset=UTF-8",
                "x-xbl-contract-version" => "1",
            ],
            "body" => json_encode([
                "parts" => [
                    [
                        "contentType" => "text",
                        "text" => $message,
                        "version" => 0
                    ]
                ]
            ])
        ];

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_POST, $requestUrl, $requestOptions);

        //TODO: response object;
        return $response;
    }
}
