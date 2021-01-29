<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

class XBLivePagingInfo
{
	protected $continuationToken = null; //string)
	protected $totalRecords = 0; //int
	
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