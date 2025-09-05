<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\UserPresence\Models;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;

class UserPresenceDevice
{
    public $type; //String
    public $titles = array(); //Array

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['type'])) {
            $this->type = $data['type'];
        }

        for($i=0; $i<count($data["titles"]); $i++)
        {
            array_push($this->titles, new UserPresenceTitle($data["titles"][$i]));
        }
    }
}
