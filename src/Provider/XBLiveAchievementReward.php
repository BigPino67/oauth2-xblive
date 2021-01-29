<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLiveAchievementReward
{
	public $name; //String
	public $description; //String
	public $value; //String
	public $type; //String
	public $valueType; //String
	
    public function __construct($data = [])
    {
		if (isset($data['name'])) {
            $this->name = $data['name'];
        }
		
		if (isset($data['description'])) {
            $this->description = $data['description'];
        }
		
		if (isset($data['type'])) {
            $this->type = $data['type'];
        }
		
		if (isset($data['value'])) {
			if($this->type != null && $this->type == "Art")
				$this->value = str_replace("http://images-eds.", "https://images-eds-ssl.", $data['value']);
			else
				$this->value = $data['value'];
        }
		
		if (isset($data['valueType'])) {
            $this->valueType = $data['valueType'];
        }
    }
}