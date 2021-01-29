<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use RuntimeException;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXuiClaimXasu;

class XBLiveDisplayClaimXasu
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
				array_push($this->xui, new XBLiveXuiClaimXasu($options[$i]["uhs"]));
			}
			else
			{
				throw new UnexpectedValueException(
					'Invalid user hash inside XASU token'
				);
			}
			
		}
    }
	
	public function getXuiClaims()
    {
        return $this->xui;
    }
}