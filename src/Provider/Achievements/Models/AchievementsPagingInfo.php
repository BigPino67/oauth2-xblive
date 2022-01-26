<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Models;

class AchievementsPagingInfo
{
	protected String $continuationToken = "";
	protected int $totalRecords = 0;
	
    public function __construct($data = [])
    {
		if (isset($data['continuationToken'])) {
            $this->continuationToken = $data['continuationToken'];
        }
		
		if (isset($data['totalRecords'])) {
            $this->totalRecords = $data['totalRecords'];
        }
    }
	
	public function getContinuationToken()
	{
		return $this->continuationToken;
	}
	
	public function getTotalRecords()
	{
		return $this->totalRecords;
	}
}