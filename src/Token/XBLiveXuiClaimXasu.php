<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use RuntimeException;

class XBLiveXuiClaimXasu
{
    protected $ush;

    public function __construct($userHash)
    {
        $this->ush = $userHash;
    }
	
	public function getUserHash()
    {
        return $this->ush;
    }
}