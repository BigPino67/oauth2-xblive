<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Models;

class AchievementTitleAssociation
{
	public String $name;
	public int $id;
	public String $version;
	
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