<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Profiles\Response;

use BigPino67\OAuth2\XBLive\Client\Provider\Profiles\Models\Profile;

class ProfilesResponse
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
			array_push($this->profileUsers, new Profile($data["profileUsers"][$i]));
		}
    }
	
	public function getProfileUsers()
	{
		return $this->profileUsers;
	}
}