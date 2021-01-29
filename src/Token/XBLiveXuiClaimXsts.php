<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use RuntimeException;

class XBLiveXuiClaimXsts
{
    protected $agg;
    protected $gtg;
    protected $prv;
    protected $xid;
    protected $uhs;

    public function __construct(array $options)
    {
        if (isset($options['agg'])) {
            $this->agg = $options['agg'];
        }
		if (isset($options['gtg'])) {
            $this->gtg = $options['gtg'];
        }
		if (isset($options['prv'])) {
            $this->prv = $options['prv'];
        }
		if (isset($options['xid'])) {
            $this->xid = $options['xid'];
        }
		if (isset($options['uhs'])) {
            $this->uhs = $options['uhs'];
        }
    }
	
	public function getAgeGroup()
    {
        return $this->agg;
    }
	
	public function getGamertag()
    {
        return $this->gtg;
    }
	
	public function getPrivileges()
    {
        return $this->prv;
    }
	
	public function getXuid()
    {
        return $this->xid;
    }
	
	public function getUserHash()
    {
        return $this->uhs;
    }
}