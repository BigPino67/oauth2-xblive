<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\UserPresence\Response;

use BigPino67\OAuth2\XBLive\Client\Provider\UserPresence\Models\UserPresenceDevice;

class UserPresenceResponse
{
    public $xuid; //String
    public $state; //String
    public $devices; //array
    public $cloaked; //boolean

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if(!isset($data["xuid"]) || !isset($data["state"]))
            throw new UnexpectedValueException(
                'XBOX Live service has returned invalid achievements data'
            );

        if (isset($data['xuid'])) {
            $this->xuid = $data['xuid'];
        }

        if (isset($data['state'])) {
            $this->state = $data['state'];
        }

        if(array_key_exists("devices", $data)){
            $this->devices = array();
            for($i=0; $i<count($data["devices"]); $i++)
            {
                array_push($this->devices, new UserPresenceDevice($data["devices"][$i]));
            }
        }

        if (isset($data['cloaked'])) {
            $this->cloaked = $data['cloaked'];
        }
    }

    public function getState(): String
    {
        return $this->state;
    }

    public function getDevices()
    {
        return $this->devices;
    }

    public function getCloaked()
    {
        return $this->cloaked;
    }
}
