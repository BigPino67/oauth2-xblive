<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Models;

class AchievementProgression
{
	public String $achievementState;
	public $requirements;
	public String $timeUnlocked;
	
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