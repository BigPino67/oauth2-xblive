<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLiveAchievementMediaAsset
{
	public $name; //String
	public $type; //String
	public $url; //String
	
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