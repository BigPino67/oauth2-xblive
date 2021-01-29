<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveAchievement;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLivePagingInfo;

class XBLiveAchievementsResponse
{
	protected $achievements = array(); //array( Achievements )
	protected $pagingInfo; //PagingInfo
	
    public function __construct($data = [])
    {
		if(count($data) == 0)
			throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );
		
		if(!isset($data["achievements"]) || !isset($data["pagingInfo"]))
			throw new UnexpectedValueException(
                'XBOX Live service has returned invalid achievements data'
            );
			
        for($i=0; $i<count($data["achievements"]); $i++)
		{
			array_push($this->achievements, new XBLiveAchievement($data["achievements"][$i]));
		}
		
		$this->pagingInfo = new XBLivePagingInfo($data["pagingInfo"]);
    }
	
	public function getAchievements()
	{
		return $this->achievements;
	}
	
	public function getPagingInfo()
	{
		return $this->pagingInfo;
	}
}