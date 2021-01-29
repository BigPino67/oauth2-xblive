<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLiveAchievementTitleAssociation
{
	public $name; //String
	public $id; //int
	public $version; //String
	
    public function __construct($data = [])
    {
		if (isset($data['name'])) {
            $this->name = $data['name'];
        }
		
		if (isset($data['id'])) {
            $this->id = $data['id'];
        }
		
		if (isset($data['version'])) {
            $this->version = $data['version'];
        }
    }
}