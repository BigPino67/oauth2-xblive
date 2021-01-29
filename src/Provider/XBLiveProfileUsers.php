<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveProfile;

class XBLiveProfileUsers
{
	protected $profileUsers = array();
	
    public function __construct($data = [])
    {
		if(count($data) == 0)
			throw new UnexpectedValueException(
                'XBOX Live service has returned no profile data'
            );
			
        for($i=0; $i<count($data["profileUsers"]); $i++)
		{
			array_push($this->profileUsers, new XBLiveProfile($data["profileUsers"][$i]));
		}
    }
	
	public function getProfileUsers()
	{
		return $this->profileUsers;
	}
}