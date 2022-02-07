<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Profiles\Models;

class ProfileSetting
{
	protected $gameDisplayName = null;
    protected $gameDisplayPicRaw = null;
    protected $gamerscore = null;
    protected $gamertag = null;
    protected $accountTier = null;
    protected $xboxOneRep = null;
    protected $preferredColor = null;
    protected $realName = null;
    protected $bio = null;
    protected $location = null;
    protected $watermarks = null;
    protected $tenureLevel = null;
    protected $isDeleted = null;
    protected $showUserAsAvatar = null;

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
			else if($id == "AccountTier")
				$this->accountTier = $value;
			else if($id == "XboxOneRep")
				$this->xboxOneRep = $value;
			else if($id == "PreferredColor")
				$this->preferredColor = $value;
			else if($id == "RealName")
				$this->realName = $value;
			else if($id == "Bio")
				$this->bio = $value;
			else if($id == "Location")
				$this->location = $value;
			else if($id == "Watermarks")
				$this->watermarks = $value;
			else if($id == "TenureLevel")
				$this->tenureLevel = $value;
			else if($id == "IsDeleted")
				$this->isDeleted = $value;
			else if($id == "ShowUserAsAvatar")
				$this->showUserAsAvatar = $value;
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

	public function getAccountTier()
	{
		return $this->accountTier;
	}

	public function getXboxOneRep()
	{
		return $this->xboxOneRep;
	}

	public function getPreferredColor()
	{
		return $this->preferredColor;
	}

	public function getRealName()
	{
		return $this->realName;
	}

	public function getBio()
	{
		return $this->bio;
	}

	public function getLocation()
	{
		return $this->location;
	}

	public function getWatermarks()
	{
		return $this->watermarks;
	}

	public function getTenureLevel()
	{
		return $this->tenureLevel;
	}

	public function getIsDeleted()
	{
		return $this->isDeleted;
	}

	public function getShowUserAsAvatar()
	{
		return $this->showUserAsAvatar;
	}
}