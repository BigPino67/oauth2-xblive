<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use RuntimeException;

class XBLiveXasuToken
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
            $this->displayClaims = new XBLiveDisplayClaimXasu($options['DisplayClaims']["xui"]);
        }
		
		if($this->token == null)
		{
			throw new UnexpectedValueException(
                "XASU token value can't be null!"
            );
		}
			
    }
	
	public function getToken()
    {
        return $this->token;
    }
}