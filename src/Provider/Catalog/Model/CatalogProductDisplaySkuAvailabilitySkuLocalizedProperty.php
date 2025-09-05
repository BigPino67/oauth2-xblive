<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilitySkuLocalizedProperty
{
    public $Contributors = array(); //String
    public $WebBlendsData; //Object
    public $Features = array(); //Array
    public $ReleaseNotes; //String
    public $MinimumNotes; //String
    public $RecommendedNotes; //String
    public $SkuDescription; //String
    public $SkuTitle; //String
    public $SkuButtonTitle; //String
    public $DeliveryDateOverlay; //String
    public $SkuDisplayRank = array(); //Array
    public $TextResources; //String
    public $Images; //String
    public $LegalText; //Object
    public $Language; //String
    public $Markets = array(); //Array

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['Contributors'])) {
            //@TODO not found any title with this property fulled
            $this->Contributors = $data['Contributors'];
        }

        if (isset($data['WebBlendsData'])) {
            $this->WebBlendsData = new CatalogProductDisplaySkuAvailabilitySkuLocalizedPropertyWebBlendsData($data["WebBlendsData"]);
        }

        if (isset($data['Features'])) {
            //@TODO not found any title with this property fulled
            $this->Features = $data['Features'];
        }

        if (isset($data['ReleaseNotes'])) {
            $this->ReleaseNotes = $data['ReleaseNotes'];
        }

        if (isset($data['MinimumNotes'])) {
            $this->MinimumNotes = $data['MinimumNotes'];
        }

        if (isset($data['RecommendedNotes'])) {
            $this->RecommendedNotes = $data['RecommendedNotes'];
        }

        if (isset($data['SkuDescription'])) {
            $this->SkuDescription = $data['SkuDescription'];
        }

        if (isset($data['SkuTitle'])) {
            $this->SkuTitle = $data['SkuTitle'];
        }

        if (isset($data['SkuButtonTitle'])) {
            $this->SkuButtonTitle = $data['SkuButtonTitle'];
        }

        if (isset($data['DeliveryDateOverlay'])) {
            $this->DeliveryDateOverlay = $data['DeliveryDateOverlay'];
        }

        if (isset($data['SkuDisplayRank'])) {
            //@TODO not found any title with this property fulled
            $this->SkuDisplayRank = $data['SkuDisplayRank'];
        }

        if (isset($data['TextResources'])) {
            $this->TextResources = $data['TextResources'];
        }

        if (isset($data['LegalText'])) {
            //@TODO not found any title with this property fulled
            $this->Images = $data['Images'];
        }

        if (isset($data['LegalText'])) {
            $this->LegalText = new CatalogProductDisplaySkuAvailabilitySkuLocalizedPropertyLegalText($data['LegalText']);
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

    public function getContributors()
    {
        return $this->Contributors;
    }

    public function getWebBlendsData()
    {
        return $this->WebBlendsData;
    }

    public function getFeatures()
    {
        return $this->Features;
    }

    public function getReleaseNotes()
    {
        return $this->ReleaseNotes;
    }

    public function getMinimumNotes()
    {
        return $this->MinimumNotes;
    }

    public function getRecommendedNotes()
    {
        return $this->RecommendedNotes;
    }

    public function getSkuDescription()
    {
        return $this->SkuDescription;
    }

    public function getSkuTitle()
    {
        return $this->SkuTitle;
    }

    public function getSkuButtonTitle()
    {
        return $this->SkuButtonTitle;
    }

    public function getDeliveryDateOverlay()
    {
        return $this->DeliveryDateOverlay;
    }

    public function getSkuDisplayRank()
    {
        return $this->SkuDisplayRank;
    }

    public function getTextResources()
    {
        return $this->TextResources;
    }

    public function getImages()
    {
        return $this->Images;
    }

    public function getLegalText(): CatalogProductDisplaySkuAvailabilitySkuLocalizedPropertyLegalText
    {
        return $this->LegalText;
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
