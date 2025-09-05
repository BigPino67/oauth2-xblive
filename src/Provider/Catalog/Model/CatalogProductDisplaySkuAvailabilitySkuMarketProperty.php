<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilitySkuMarketProperty
{
    public $SupportedLanguages = array(); //String
    public $FirstAvailableDate; //String
    public $PackageIds; //String
    public $PIFilter; //String
    public $Markets = array(); //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['SupportedLanguages'])) {
            for($i=0; $i<count($data["SupportedLanguages"]); $i++)
            {
                array_push($this->SupportedLanguages , $data["SupportedLanguages"][$i]);
            }
        }

        if (isset($data['FirstAvailableDate'])) {
            $this->FirstAvailableDate = $data['FirstAvailableDate'];
        }

        if (isset($data['PackageIds'])) {
            $this->PackageIds = $data['PackageIds'];
        }

        if (isset($data['PIFilter'])) {
            $this->PIFilter = $data['PIFilter'];
        }

        if (isset($data['Markets'])) {
            for($i=0; $i<count($data["Markets"]); $i++)
            {
                array_push($this->Markets , $data["Markets"][$i]);
            }
        }
    }

    public function getSupportedLanguages()
    {
        return $this->SupportedLanguages;
    }

    public function getFirstAvailableDate()
    {
        return $this->FirstAvailableDate;
    }

    public function getPackageIds()
    {
        return $this->PackageIds;
    }

    public function getPIFilter()
    {
        return $this->PIFilter;
    }

    public function getMarkets()
    {
        return $this->Markets;
    }
}
