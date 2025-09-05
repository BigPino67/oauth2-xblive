<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilitySku
{
    public $LastModifiedDate; //String
    public $LocalizedProperties = array(); //Array
    public $MarketProperties = array(); //Array
    public $ProductId; //String
    public $Properties; //Object
    public $SkuASchema; //String
    public $SkuBSchema; //String
    public $SkuId; //String
    public $SkuType; //String
    public $RecurrencePolicy; //String
    public $SubscriptionPolicyId; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['LastModifiedDate'])) {
            $this->LastModifiedDate = $data['LastModifiedDate'];
        }

        if (isset($data['LocalizedProperties'])) {
            for($i=0; $i<count($data["LocalizedProperties"]); $i++)
            {
                array_push($this->LocalizedProperties, new CatalogProductDisplaySkuAvailabilitySkuLocalizedProperty($data["LocalizedProperties"][$i]));
            }
        }

        if (isset($data['MarketProperties'])) {
            for($i=0; $i<count($data["MarketProperties"]); $i++)
            {
                array_push($this->MarketProperties, new CatalogProductDisplaySkuAvailabilitySkuMarketProperty($data["MarketProperties"][$i]));
            }
        }

        if (isset($data['ProductId'])) {
            $this->ProductId = $data['ProductId'];
        }

        if (isset($data['Properties'])) {
            $this->Properties = new CatalogProductDisplaySkuAvailabilitySkuProperty($data['Properties']);
        }

        if (isset($data['SkuASchema'])) {
            $this->SkuASchema = $data['SkuASchema'];
        }

        if (isset($data['SkuBSchema'])) {
            $this->SkuBSchema = $data['SkuBSchema'];
        }

        if (isset($data['SkuId'])) {
            $this->SkuId = $data['SkuId'];
        }

        if (isset($data['SkuType'])) {
            $this->SkuType = $data['SkuType'];
        }

        if (isset($data['RecurrencePolicy'])) {
            $this->RecurrencePolicy = $data['RecurrencePolicy'];
        }

        if (isset($data['SubscriptionPolicyId'])) {
            $this->SubscriptionPolicyId = $data['SubscriptionPolicyId'];
        }
    }

    public function getLastModifiedDate()
    {
        return $this->LastModifiedDate;
    }

    public function getLocalizedProperties()
    {
        return $this->LocalizedProperties;
    }

    public function getMarketProperties()
    {
        return $this->MarketProperties;
    }

    public function getProductId()
    {
        return $this->ProductId;
    }

    public function getProperties(): CatalogProductDisplaySkuAvailabilitySkuProperty
    {
        return $this->Properties;
    }

    public function getSkuASchema()
    {
        return $this->SkuASchema;
    }

    public function getSkuBSchema()
    {
        return $this->SkuBSchema;
    }

    public function getSkuId()
    {
        return $this->SkuId;
    }

    public function getSkuType()
    {
        return $this->SkuType;
    }

    public function getRecurrencePolicy()
    {
        return $this->RecurrencePolicy;
    }

    public function getSubscriptionPolicyId()
    {
        return $this->SubscriptionPolicyId;
    }
}
