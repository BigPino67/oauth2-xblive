<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductMarketProperty
{
    public $OriginalReleaseDate; //String
    public $OriginalReleaseDateFriendlyName; //String
    public $MinimumUserAge; //Int
    public $ContentRatings = array(); //Array
    public $RelatedProducts = array(); //Array
    public $UsageData = array(); //Array
    public $BundleConfig; //String
    public $Markets = array(); //Array

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['OriginalReleaseDate'])) {
            $this->OriginalReleaseDate = $data['OriginalReleaseDate'];
        }

        if (isset($data['OriginalReleaseDateFriendlyName'])) {
            $this->OriginalReleaseDateFriendlyName = $data['OriginalReleaseDateFriendlyName'];
        }

        if (isset($data['MinimumUserAge'])) {
            $this->MinimumUserAge = $data['MinimumUserAge'];
        }

        if (isset($data['ContentRatings'])) {
            for($i=0; $i<count($data["ContentRatings"]); $i++)
            {
                array_push($this->ContentRatings, new CatalogProductContentRating($data["ContentRatings"][$i]));
            }
        }

        if (isset($data['RelatedProducts'])) {
            for($i=0; $i<count($data["RelatedProducts"]); $i++)
            {
                array_push($this->RelatedProducts, new CatalogRelatedProduct($data["RelatedProducts"][$i]));
            }
        }

        if (isset($data['UsageData'])) {
            for($i=0; $i<count($data["UsageData"]); $i++)
            {
                array_push($this->UsageData, new CatalogUsageData($data["UsageData"][$i]));
            }
        }

        if (isset($data['BundleConfig'])) {
            $this->BundleConfig = $data['BundleConfig'];
        }

        if (isset($data['Markets'])) {
            for($i=0; $i<count($data["Markets"]); $i++)
            {
                array_push($this->Markets, $data["Markets"][$i]);
            }
        }
    }

    public function getOriginalReleaseDate()
    {
        return $this->OriginalReleaseDate;
    }

    public function getOriginalReleaseDateFriendlyName()
    {
        return $this->OriginalReleaseDateFriendlyName;
    }

    public function getMinimumUserAge()
    {
        return $this->MinimumUserAge;
    }

    public function getContentRatings()
    {
        return $this->ContentRatings;
    }

    public function getMarketProperties()
    {
        return $this->MarketProperties;
    }

    public function getRelatedProducts()
    {
        return $this->RelatedProducts;
    }

    public function getUsageData()
    {
        return $this->UsageData;
    }

    public function getBundleConfig()
    {
        return $this->BundleConfig;
    }

    public function getMarkets()
    {
        return $this->Markets;
    }
}
