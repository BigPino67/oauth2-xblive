<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use RuntimeException;

class XBLiveXstsToken
{
	protected $issueInstant = null;
    protected $notAfter = null;
    protected $token = null;
    protected $displayClaims = null;

    public function __construct(array $options = [])
    {
		if (isset($options['IssueInstant'])) {
            $this->issueInstant = new \DateTime($options['IssueInstant']);
        }
		if (isset($options['NotAfter'])) {
            $this->notAfter = new \DateTime($options['NotAfter']);
        }
		if (isset($options['Token'])) {
            $this->token = $options['Token'];
        }
		if (isset($options['DisplayClaims'])) {
            $this->displayClaims = new XBLiveDisplayClaimXsts($options['DisplayClaims']["xui"]);
        }
    }
	
	public function getToken()
    {
        return $this->token;
    }
	
	public function getDisplayClaims()
    {
        return $this->displayClaims;
    }
	
	public function getXstsUserHash()
    {
        return $this->getDisplayClaims()->getXuiClaims()[0]->getUserHash();
    }
	
	public function getXstsXuid()
    {
        return $this->getDisplayClaims()->getXuiClaims()[0]->getXuid();
    }
	
	public function getAuthorizationHeader()
    {
        return 'XBL3.0 x='.$this->getXstsUserHash().';'.$this->getToken();
    }
}