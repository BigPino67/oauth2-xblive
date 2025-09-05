<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\UserPresence\Models;

class UserPresenceTitle
{
    public $id; //String
    public $name; //String
    public $placement; //String
    public $state; //String
    public $lastModified; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['name'])) {
            $this->name = $data['name'];
        }

        if (isset($data['placement'])) {
            $this->placement = $data['placement'];
        }

        if (isset($data['state'])) {
            $this->state = $data['state'];
        }

        if (isset($data['lastModified'])) {
            $this->lastModified = $data['lastModified'];
        }
    }
}
