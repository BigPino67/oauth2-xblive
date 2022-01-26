<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Models;

class AchievementMediaAsset
{
	public String $name;
	public String $type;
	public String $url;
	
    public function __construct($data = [])
    {
		if (isset($data['name'])) {
            $this->name = $data['name'];
        }
		
		if (isset($data['type'])) {
            $this->type = $data['type'];
        }
		
		if (isset($data['url'])) {
            $this->url = str_replace("http://images-eds.", "https://images-eds-ssl.", $data['url']);
        }
    }
}