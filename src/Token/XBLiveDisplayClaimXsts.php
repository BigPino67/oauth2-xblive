<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use RuntimeException;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXuiClaimXsts;

class XBLiveDisplayClaimXsts
{
    protected $xui = array();

    public function __construct(array $options = [])
    {
        if(count($options) == 0)
			throw new UnexpectedValueException(
                'XBOX Live service has returned no xui claims'
            );
		
		for($i=0; $i<count($options); $i++){
			if(array_key_exists("uhs", $options[$i]) && $options[$i]["uhs"] != "")
			{
				array_push($this->xui, new XBLiveXuiClaimXsts($options[$i]));
			}
			else
			{
				throw new UnexpectedValueException(
					'Invalid user hash inside XSTS token'
				);
			}
			
		}
    }
	
	public function getXuiClaims()
    {
        return $this->xui;
    }
}