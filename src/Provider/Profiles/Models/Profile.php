<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Profiles\Models;

use BigPino67\OAuth2\XBLive\Client\Provider\Profiles\Models\XBLiveProfileSetting;

class Profile
{
	protected $id = null;
    protected $hostId = null;
    protected $settings = null;
    protected $isSponsoredUser = false;
	
    public function __construct($data = [])
    {
		if (isset($data['id'])) {
            $this->id = $data['id'];
        }
		if (isset($data['hostId'])) {
            $this->hostId = $data['hostId'];
        }
		if (isset($data['settings'])) {
            $this->settings = new ProfileSetting($data['settings']);
        }
		if (isset($data['isSponsoredUser'])) {
            $this->isSponsoredUser = $data['isSponsoredUser'];
        }
    }
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getHostId()
	{
		return $this->hostId;
	}
	
	public function getSettings()
	{
		return $this->settings;
	}
	
	public function isSponsoredUser()
	{
		return $this->isSponsoredUser;
	}
}