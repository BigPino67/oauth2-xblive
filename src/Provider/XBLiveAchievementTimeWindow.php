<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLiveAchievementTimeWindow
{
	public $startDate; //Date
	public $endDate; //Date
	
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