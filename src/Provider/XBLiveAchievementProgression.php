<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLiveAchievementProgression
{
	public $achievementState; //String
	public $requirements; //String
	public $timeUnlocked; //String
	
    public function __construct($data = [])
    {
		if (isset($data['achievementState'])) {
            $this->achievementState = $data['achievementState'];
        }
		
		if (isset($data['requirements'])) {
            $this->requirements = $data['requirements'];
        }
		
		if (isset($data['timeUnlocked'])) {
            $this->timeUnlocked = $data['timeUnlocked'];
        }
    }
}