<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider;

use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveAchievementTitleAssociation;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveAchievementProgression;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveAchievementMediaAsset;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveAchievementTimeWindow;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLiveAchievementReward;

class XBLiveAchievement
{
	public $id; //String
	public $serviceConfigId; //String
	public $name; //String
	public $titleAssociations = array(); //array( TitleAssociation )
	public $progressState; //String
	public $progression; //( Progression )
	public $mediaAssets = array(); //array( MediaAsset )
	public $platform; //String
	public $platforms; //array( String )
	public $isSecret; //boolean 
	public $description; //String
	public $lockedDescription; //String
	public $productId; //String
	public $achievementType; //String
	public $participationType; //String
	public $timeWindow; //( TimeWindow )
	public $rewards = array(); //array( Reward )
	public $estimatedTime; //String
	public $deeplink; //String
	public $isRevoked; //boolean 
	
    public function __construct($data = [])
    {
		if(count($data) == 0)
			throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );
			
		if (isset($data['id'])) {
            $this->id = $data['id'];
        }
		
		if (isset($data['serviceConfigId'])) {
            $this->serviceConfigId = $data['serviceConfigId'];
        }
		
		if (isset($data['name'])) {
            $this->name = $data['name'];
        }
		
		if (isset($data['titleAssociations'])) {
			for($i=0; $i<count($data["titleAssociations"]); $i++)
			{
				array_push($this->titleAssociations, new XBLiveAchievementTitleAssociation($data["titleAssociations"][$i]));
			}
        }
			
        if (isset($data['progressState'])) {
            $this->progressState = $data['progressState'];
        }
		
		if (isset($data['progression'])) {
            $this->progression = new XBLiveAchievementProgression($data['progression']);
        }
		
		if (isset($data['mediaAssets'])) {
			for($i=0; $i<count($data["mediaAssets"]); $i++)
			{
				array_push($this->mediaAssets, new XBLiveAchievementMediaAsset($data["mediaAssets"][$i]));
			}
        }
		
		if (isset($data['platform'])) {
            $this->platform = $data['platform'];
        }
		
		if (isset($data['platforms'])) {
            $this->platforms = $data['platforms'];
        }
		
		if (isset($data['isSecret'])) {
            $this->isSecret = $data['isSecret'];
        }
		
		if (isset($data['description'])) {
            $this->description = $data['description'];
        }
		
		if (isset($data['lockedDescription'])) {
            $this->lockedDescription = $data['lockedDescription'];
        }
		
		if (isset($data['productId'])) {
            $this->productId = $data['productId'];
        }
		
		if (isset($data['achievementType'])) {
            $this->achievementType = $data['achievementType'];
        }
		
		if (isset($data['participationType'])) {
            $this->participationType = $data['participationType'];
        }
		
		if (isset($data['timeWindow'])) {
            $this->timeWindow = new XBLiveAchievementProgression($data['timeWindow']);
        }
		
		if (isset($data['rewards'])) {
			for($i=0; $i<count($data["rewards"]); $i++)
			{
				array_push($this->rewards, new XBLiveAchievementReward($data["rewards"][$i]));
			}
        }
		
		if (isset($data['estimatedTime'])) {
            $this->estimatedTime = $data['estimatedTime'];
        }
		
		if (isset($data['deeplink'])) {
            $this->deeplink = $data['deeplink'];
        }
		
		if (isset($data['isRevoked'])) {
            $this->isRevoked = $data['isRevoked'];
        }
    }
}