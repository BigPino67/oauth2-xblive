<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductLocalizedProperty
{
    public $DeveloperName; //String
    public $PublisherName; //String
    public $PublisherAddress; //String
    public $PublisherWebsiteUri; //String
    public $SupportUri; //String
    public $SupportPhone; //String
    public $CMSVideos = array(); //Array
    public $EligibilityProperties = array(); //Array
    public $Franchises = array(); //Array
    public $Images = array(); //Array
    public $Videos = array(); //Array
    public $ProductDescription; //String
    public $ProductTitle; //String
    public $ShortTitle; //String
    public $SortTitle; //String
    public $FriendlyTitle; //String
    public $ShortDescription; //String
    public $SearchTitles = array(); //Array
    public $VoiceTitle; //String
    public $RenderGroupDetails; //String
    public $ProductDisplayRanks = array(); //Array
    public $InteractiveModelConfig; //String
    public $Interactive3DEnabled; //Boolean
    public $Language; //Boolean
    public $Markets = array(); //Array

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['DeveloperName'])) {
            $this->DeveloperName = $data['DeveloperName'];
        }

        if (isset($data['PublisherName'])) {
            $this->PublisherName = $data['PublisherName'];
        }

        if (isset($data['PublisherAddress'])) {
            $this->PublisherAddress = $data['PublisherAddress'];
        }

        if (isset($data['PublisherWebsiteUri'])) {
            $this->PublisherWebsiteUri = $data['PublisherWebsiteUri'];
        }

        if (isset($data['SupportUri'])) {
            $this->SupportUri = $data['SupportUri'];
        }

        if (isset($data['SupportPhone'])) {
            $this->SupportPhone = $data['SupportPhone'];
        }

        if (isset($data['CMSVideos'])) {
            //@TODO not found any title with this property fulled
            $this->CMSVideos = $data['CMSVideos'];
        }

        if (isset($data['EligibilityProperties'])) {
            //@TODO use object EligibilityProperties
            $this->EligibilityProperties = $data['EligibilityProperties'];
        }

        if (isset($data['Franchises'])) {
            //@TODO not found any title with this property fulled
            $this->Franchises = $data['Franchises'];
        }

        if (isset($data['Images'])) {
            for($i=0; $i<count($data["Images"]); $i++)
            {
                array_push($this->Images, new CatalogProductLocalizedPropertyImage($data["Images"][$i]));
            }
        }

        if (isset($data['Videos'])) {
            //@TODO not found any title with this property fulled
            $this->Videos = $data['Videos'];
        }

        if (isset($data['ProductDescription'])) {
            $this->ProductDescription = $data['ProductDescription'];
        }

        if (isset($data['ProductTitle'])) {
            $this->ProductTitle = $data['ProductTitle'];
        }

        if (isset($data['ShortTitle'])) {
            $this->ShortTitle = $data['ShortTitle'];
        }

        if (isset($data['SortTitle'])) {
            $this->SortTitle = $data['SortTitle'];
        }

        if (isset($data['FriendlyTitle'])) {
            $this->FriendlyTitle = $data['FriendlyTitle'];
        }

        if (isset($data['ShortDescription'])) {
            $this->ShortDescription = $data['ShortDescription'];
        }

        if (isset($data['SearchTitles'])) {
            for($i=0; $i<count($data["SearchTitles"]); $i++)
            {
                array_push($this->SearchTitles, new CatalogSearchTitle($data["SearchTitles"][$i]));
            }
        }

        if (isset($data['VoiceTitle'])) {
            $this->VoiceTitle = $data['VoiceTitle'];
        }

        if (isset($data['RenderGroupDetails'])) {
            $this->RenderGroupDetails = $data['RenderGroupDetails'];
        }

        if (isset($data['ProductDisplayRanks'])) {
            //@TODO not found any title with this property fulled
            $this->ProductDisplayRanks = $data['ProductDisplayRanks'];
        }

        if (isset($data['InteractiveModelConfig'])) {
            $this->InteractiveModelConfig = $data['InteractiveModelConfig'];
        }

        if (isset($data['Interactive3DEnabled'])) {
            $this->Interactive3DEnabled = $data['Interactive3DEnabled'];
        }

        if (isset($data['Language'])) {
            $this->Language = $data['Language'];
        }

        if (isset($data['Markets'])) {
            for($i=0; $i<count($data["Markets"]); $i++)
            {
                array_push($this->Markets, $data["Markets"][$i]);
            }
        }
    }

    public function getDeveloperName()
    {
        return $this->DeveloperName;
    }

    public function getPublisherName()
    {
        return $this->PublisherName;
    }

    public function getPublisherAddress()
    {
        return $this->PublisherAddress;
    }

    public function getPublisherWebsiteUri()
    {
        return $this->PublisherWebsiteUri;
    }

    public function getSupportUri()
    {
        return $this->SupportUri;
    }

    public function getSupportPhone()
    {
        return $this->SupportPhone;
    }

    public function getCMSVideos()
    {
        return $this->CMSVideos;
    }

    public function getEligibilityProperties()
    {
        return $this->EligibilityProperties;
    }

    public function getFranchises()
    {
        return $this->Franchises;
    }

    public function getImages()
    {
        return $this->Images;
    }

    public function getVideos()
    {
        return $this->Videos;
    }

    public function getProductDescription()
    {
        return $this->ProductDescription;
    }

    public function getProductTitle()
    {
        return $this->ProductTitle;
    }

    public function getShortTitle()
    {
        return $this->ShortTitle;
    }

    public function getSortTitle()
    {
        return $this->SortTitle;
    }

    public function getFriendlyTitle()
    {
        return $this->FriendlyTitle;
    }

    public function getShortDescription()
    {
        return $this->ShortDescription;
    }

    public function getSearchTitles()
    {
        return $this->SearchTitles;
    }

    public function getVoiceTitle()
    {
        return $this->VoiceTitle;
    }

    public function getRenderGroupDetails()
    {
        return $this->RenderGroupDetails;
    }

    public function getProductDisplayRanks()
    {
        return $this->ProductDisplayRanks;
    }

    public function getInteractiveModelConfig()
    {
        return $this->InteractiveModelConfig;
    }

    public function getInteractive3DEnabled()
    {
        return $this->Interactive3DEnabled;
    }

    public function getLanguage()
    {
        return $this->Language;
    }

    public function getMarkets()
    {
        return $this->Markets;
    }
}
