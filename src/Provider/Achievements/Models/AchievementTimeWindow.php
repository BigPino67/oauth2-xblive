<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Models;

class AchievementTimeWindow
{
	public \DateTime $startDate;
	public \DateTime $endDate;
	
    public function __construct($data = [])
    {
		if (isset($data['startDate'])) {
            $this->startDate = $data['startDate'];
        }
		
		if (isset($data['endDate'])) {
            $this->endDate = $data['endDate'];
        }
    }
}