<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Achievements\Models;

class AchievementRarity
{
    public String $currentCategory;
    public String $currentPercentage;

    public function __construct($data = [])
    {
        if (isset($data['currentCategory'])) {
            $this->currentCategory = $data['currentCategory'];
        }

        if (isset($data['currentPercentage'])) {
            $this->currentPercentage = $data['currentPercentage'];
        }
    }

    public function getCurrentCategory()
    {
        return $this->currentCategory;
    }

    public function getCurrentPercentage()
    {
        return $this->currentPercentage;
    }
}
