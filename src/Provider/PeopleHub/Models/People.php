<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\PeopleHub\Models;

class People
{
    protected string $xuid;
    protected bool $isFavorite;
    protected bool $isFollowingCaller;
    protected bool $isFollowedByCaller;
    protected bool $isIdentityShared;
    protected ?\DateTime $addedDateTimeUtc;
    protected string $displayName;
    protected string $realName;
    protected string $displayPicRaw;
    protected string $showUserAsAvatar;
    protected string $gamertag;
    protected string $gamerScore;
    protected string $xboxOneRep;
    protected $presenceState;
    protected $presenceText;
    protected $isSponsoredUser;

    public function __construct($data = [])
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['hostId'])) {
            $this->hostId = $data['hostId'];
        }
        if (isset($data['settings'])) {
            $this->settings = new ProfileSetting($data['settings']);
        }
        if (isset($data['isSponsoredUser'])) {
            $this->isSponsoredUser = $data['isSponsoredUser'];
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getHostId()
    {
        return $this->hostId;
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function isSponsoredUser()
    {
        return $this->isSponsoredUser;
    }
}