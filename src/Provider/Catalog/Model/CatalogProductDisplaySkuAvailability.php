<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailability
{
    public $Sku; //Object
    public $Availabilities = array(); //Array
    public $HistoricalBestAvailabilities = array(); //Array

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['Sku'])) {
            $this->Sku = new CatalogProductDisplaySkuAvailabilitySku( $data['Sku']);
        }

        if (isset($data['Availabilities'])) {
            for($i=0; $i<count($data["Availabilities"]); $i++)
            {
                array_push($this->Availabilities, new CatalogProductDisplaySkuAvailabilityAvaillabilty($data["Availabilities"][$i]));
            }
        }

        if (isset($data['HistoricalBestAvailabilities'])) {
            for($i=0; $i<count($data["HistoricalBestAvailabilities"]); $i++)
            {
                array_push($this->HistoricalBestAvailabilities, new CatalogProductDisplaySkuAvailabilityHistoricalBest($data["HistoricalBestAvailabilities"][$i]));
            }
        }
    }

    public function getSku()
    {
        return $this->Sku;
    }

    public function getAvailabilities()
    {
        return $this->Availabilities;
    }

    public function getHistoricalBestAvailabilities()
    {
        return $this->HistoricalBestAvailabilities;
    }
}
