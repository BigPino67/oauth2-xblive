<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Social\Response;

class SocialResponse
{
    public $targetFollowingCount; //Int
    public $targetFollowerCount; //Int
    public $isCallerFollowingTarget; //Boolean
    public $isTargetFollowingCaller; //Boolean
    public $hasCallerMarkedTargetAsFavorite; //Boolean
    public $hasCallerMarkedTargetAsIdentityShared; //Boolean
    public $hasCallerMarkedTargetAsKnown; //Boolean
    public $legacyFriendStatus; //String
    public $availablePeopleSlots; //Int
    public $isFriend; //Boolean
    public $availableFollowingSlots; //Int

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if(!isset($data["targetFollowingCount"]) || !isset($data["targetFollowerCount"]))
            throw new UnexpectedValueException(
                'XBOX Live service has returned invalid achievements data'
            );

        if (isset($data['targetFollowingCount'])) {
            $this->targetFollowingCount = $data['targetFollowingCount'];
        }

        if (isset($data['targetFollowerCount'])) {
            $this->targetFollowerCount = $data['targetFollowerCount'];
        }

        if (isset($data['isCallerFollowingTarget'])) {
            $this->isCallerFollowingTarget = $data['isCallerFollowingTarget'];
        }


        if (isset($data['isTargetFollowingCaller'])) {
            $this->isTargetFollowingCaller = $data['isTargetFollowingCaller'];
        }

        if (isset($data['hasCallerMarkedTargetAsFavorite'])) {
            $this->hasCallerMarkedTargetAsFavorite = $data['hasCallerMarkedTargetAsFavorite'];
        }

        if (isset($data['hasCallerMarkedTargetAsIdentityShared'])) {
            $this->hasCallerMarkedTargetAsIdentityShared = $data['hasCallerMarkedTargetAsIdentityShared'];
        }

        if (isset($data['hasCallerMarkedTargetAsKnown'])) {
            $this->hasCallerMarkedTargetAsKnown = $data['hasCallerMarkedTargetAsKnown'];
        }

        if (isset($data['legacyFriendStatus'])) {
            $this->legacyFriendStatus = $data['legacyFriendStatus'];
        }

        if (isset($data['availablePeopleSlots'])) {
            $this->availablePeopleSlots = $data['availablePeopleSlots'];
        }

        if (isset($data['isFriend'])) {
            $this->isFriend = $data['isFriend'];
        }

        if (isset($data['availableFollowingSlots'])) {
            $this->availableFollowingSlots = $data['availableFollowingSlots'];
        }
    }

    public function getTargetFollowingCount()
    {
        return $this->targetFollowingCount;
    }

    public function getTargetFollowerCount()
    {
        return $this->targetFollowerCount;
    }

    public function getIsCallerFollowingTarget()
    {
        return $this->isCallerFollowingTarget;
    }

    public function getIsTargetFollowingCaller()
    {
        return $this->isTargetFollowingCaller;
    }

    public function getHasCallerMarkedTargetAsFavorite()
    {
        return $this->hasCallerMarkedTargetAsFavorite;
    }

    public function getHasCallerMarkedTargetAsIdentityShared()
    {
        return $this->hasCallerMarkedTargetAsIdentityShared;
    }

    public function getHasCallerMarkedTargetAsKnown()
    {
        return $this->hasCallerMarkedTargetAsKnown;
    }

    public function getLegacyFriendStatus()
    {
        return $this->legacyFriendStatus;
    }

    public function getAvailablePeopleSlots()
    {
        return $this->availablePeopleSlots;
    }

    public function getIsFriend()
    {
        return $this->isFriend;
    }

    public function getAvailableFollowingSlots()
    {
        return $this->availableFollowingSlots;
    }


}
