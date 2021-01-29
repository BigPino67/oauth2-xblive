<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLiveProfileSetting
{
	protected $gameDisplayName = null;
    protected $gameDisplayPicRaw = null;
    protected $gamerscore = null;
    protected $gamertag = null;
	
    public function __construct($data = [])
    {
        for($i=0; $i<count($data); $i++)
		{
			$id = $data[$i]["id"];
			$value = $data[$i]["value"];
			
			if($id == "GameDisplayName")
				$this->gameDisplayName = $value;
			else if($id == "GameDisplayPicRaw")
				$this->gameDisplayPicRaw = str_replace("http://images-eds.", "https://images-eds-ssl.", $value);
			else if($id == "Gamerscore")
				$this->gamerscore = $value;
			else if($id == "Gamertag")
				$this->gamertag = $value;
		}
    }
	
	public function getGameDisplayName()
	{
		return $this->gameDisplayName;
	}
	
	public function getGameDisplayPicRaw()
	{
		return $this->gameDisplayPicRaw;
	}
	
	public function getGamerscore()
	{
		return $this->gamerscore;
	}
	
	public function getGamertag()
	{
		return $this->gamertag;
	}
}