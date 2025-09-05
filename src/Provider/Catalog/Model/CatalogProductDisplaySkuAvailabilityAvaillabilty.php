<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilityAvaillabilty
{
    public $Actions;
    public $AvailabilityASchema;
    public $AvailabilityBSchema;
    public $AvailabilityId;
    public $Conditions;
    public $LastModifiedDate;
    public $LicensingData;
    public $Markets;
    public $OrderManagementData;
    public $Properties;
    public $SkuId;
    public $DisplayRank;
    public $AlternateIds;
    public $RemediationRequired;

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['Actions'])) {
            $this->Actions = $data['Actions'];
        }

        if (isset($data['AvailabilityASchema'])) {
            $this->AvailabilityASchema = $data['AvailabilityASchema'];
        }

        if (isset($data['AvailabilityBSchema'])) {
            $this->AvailabilityBSchema = $data['AvailabilityBSchema'];
        }

        if (isset($data['AvailabilityId'])) {
            $this->AvailabilityId = $data['AvailabilityId'];
        }

        if (isset($data['Conditions'])) {
            $this->Conditions = $data['Conditions'];
        }

        if (isset($data['LastModifiedDate'])) {
            $this->LastModifiedDate = $data['LastModifiedDate'];
        }

        if (isset($data['LicensingData'])) {
            $this->LicensingData = $data['LicensingData'];
        }

        if (isset($data['Markets'])) {
            $this->Markets = $data['Markets'];
        }

        if (isset($data['OrderManagementData'])) {
            $this->OrderManagementData = $data['OrderManagementData'];
        }

        if (isset($data['Properties'])) {
            $this->Properties = $data['Properties'];
        }

        if (isset($data['SkuId'])) {
            $this->SkuId = $data['SkuId'];
        }

        if (isset($data['DisplayRank'])) {
            $this->DisplayRank = $data['DisplayRank'];
        }

        if (isset($data['AlternateIds'])) {
            $this->AlternateIds = $data['AlternateIds'];
        }

        if (isset($data['RemediationRequired'])) {
            $this->RemediationRequired = $data['RemediationRequired'];
        }
    }

    public function getActions()
    {
        return $this->Actions;
    }

    public function getAvailabilityASchema()
    {
        return $this->AvailabilityASchema;
    }

    public function getAvailabilityBSchema()
    {
        return $this->AvailabilityBSchema;
    }

    public function getAvailabilityId()
    {
        return $this->AvailabilityId;
    }

    public function getConditions()
    {
        return $this->Conditions;
    }

    public function getLastModifiedDate()
    {
        return $this->LastModifiedDate;
    }

    public function getLicensingData()
    {
        return $this->LicensingData;
    }

    public function getMarkets()
    {
        return $this->Markets;
    }

    public function getOrderManagementData()
    {
        return $this->OrderManagementData;
    }

    public function getProperties()
    {
        return $this->Properties;
    }

    public function getSkuId()
    {
        return $this->SkuId;
    }

    public function getDisplayRank()
    {
        return $this->DisplayRank;
    }

    public function getAlternateIds()
    {
        return $this->AlternateIds;
    }

    public function getRemediationRequired()
    {
        return $this->RemediationRequired;
    }
}
