<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatatalogProduct
{
    public $LastModifiedDate; //String
    public $LocalizedProperties = array(); //Array
    public $MarketProperties = array(); //Array
    public $ProductASchema; //String
    public $ProductBSchema; //String
    public $ProductId; //String
    public $Properties; //Object
    public $AlternateIds = array(); //Array
    public $DomainDataVersion; //String
    public $IngestionSource; //String
    public $IsMicrosoftProduct; //Boolean
    public $PreferredSkuId; //String
    public $ProductType; //String
    public $ValidationData; //Object
    public $MerchandizingTags = array(); //Array
    public $SandboxId; //String
    public $ProductFamily; //String
    public $SchemaVersion; //String
    public $IsSandboxedProduct; //Boolean
    public $ProductKind; //String
    public $ProductPolicies = array(); //Array
    public $DisplaySkuAvailabilities = array(); //Array

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
                array_push($this->LocalizedProperties, new CatalogProductLocalizedProperty($data["LocalizedProperties"][$i]));
            }
        }

        if (isset($data['MarketProperties'])) {
            for($i=0; $i<count($data["MarketProperties"]); $i++)
            {
                array_push($this->MarketProperties, new CatalogProductMarketProperty($data["MarketProperties"][$i]));
            }
        }

        if (isset($data['ProductASchema'])) {
            $this->ProductASchema = $data['ProductASchema'];
        }

        if (isset($data['ProductBSchema'])) {
            $this->ProductBSchema = $data['ProductBSchema'];
        }

        if (isset($data['ProductId'])) {
            $this->ProductId = $data['ProductId'];
        }

        if (isset($data['Properties'])) {
            $this->Properties = new CatalogProductProperty($data["Properties"]);
        }

        if (isset($data['AlternateIds'])) {
            for($i=0; $i<count($data["AlternateIds"]); $i++)
            {
                array_push($this->AlternateIds, new CatalogProductAlternateId($data["AlternateIds"][$i]));
            }
        }

        if (isset($data['DomainDataVersion'])) {
            $this->DomainDataVersion = $data['DomainDataVersion'];
        }

        if (isset($data['IngestionSource'])) {
            $this->IngestionSource = $data['IngestionSource'];
        }

        if (isset($data['IsMicrosoftProduct'])) {
            $this->IsMicrosoftProduct = $data['IsMicrosoftProduct'];
        }

        if (isset($data['PreferredSkuId'])) {
            $this->PreferredSkuId = $data['PreferredSkuId'];
        }

        if (isset($data['ProductType'])) {
            $this->ProductType = $data['ProductType'];
        }

        if (isset($data['ValidationData'])) {
            $this->ValidationData = new CatalogProductValidationData($data["ValidationData"]);
        }

        if (isset($data['MerchandizingTags'])) {
            //@TODO not found any title with this property fulled
            $this->MerchandizingTags = $data['MerchandizingTags'];
        }

        if (isset($data['SandboxId'])) {
            $this->SandboxId = $data['SandboxId'];
        }

        if (isset($data['ProductFamily'])) {
            $this->ProductFamily = $data['ProductFamily'];
        }

        if (isset($data['SchemaVersion'])) {
            $this->SchemaVersion = $data['SchemaVersion'];
        }

        if (isset($data['IsSandboxedProduct'])) {
            $this->IsSandboxedProduct = $data['IsSandboxedProduct'];
        }

        if (isset($data['ProductKind'])) {
            $this->ProductKind = $data['ProductKind'];
        }

        if (isset($data['ProductPolicies'])) {
            //@TODO not found any title with this property fulled
            $this->ProductPolicies = $data['ProductPolicies'];
        }

        if (isset($data['DisplaySkuAvailabilities'])) {
            for($i=0; $i<count($data["DisplaySkuAvailabilities"]); $i++)
            {
                array_push($this->DisplaySkuAvailabilities, new CatalogProductDisplaySkuAvailability($data["DisplaySkuAvailabilities"][$i]));
            }
        }
    }

    public function getLastModifiedDate(): mixed
    {
        return $this->LastModifiedDate;
    }

    public function getLocalizedProperties(): array
    {
        return $this->LocalizedProperties;
    }

    public function getMarketProperties(): array
    {
        return $this->MarketProperties;
    }

    public function getProductASchema(): mixed
    {
        return $this->ProductASchema;
    }

    public function getProductBSchema(): mixed
    {
        return $this->ProductBSchema;
    }

    public function getProductId(): mixed
    {
        return $this->ProductId;
    }

    public function getProperties(): array
    {
        return $this->Properties;
    }

    public function getAlternateIds(): array
    {
        return $this->AlternateIds;
    }

    public function getDomainDataVersion(): mixed
    {
        return $this->DomainDataVersion;
    }

    public function getIngestionSource(): mixed
    {
        return $this->IngestionSource;
    }

    public function getIsMicrosoftProduct(): mixed
    {
        return $this->IsMicrosoftProduct;
    }

    public function getPreferredSkuId(): mixed
    {
        return $this->PreferredSkuId;
    }

    public function getProductType(): mixed
    {
        return $this->ProductType;
    }

    public function getValidationData(): array
    {
        return $this->ValidationData;
    }

    public function getMerchandizingTags(): mixed
    {
        return $this->MerchandizingTags;
    }

    public function getSandboxId(): mixed
    {
        return $this->SandboxId;
    }

    public function getProductFamily(): mixed
    {
        return $this->ProductFamily;
    }

    public function getSchemaVersion(): mixed
    {
        return $this->SchemaVersion;
    }

    public function getIsSandboxedProduct(): mixed
    {
        return $this->IsSandboxedProduct;
    }

    public function getProductKind(): mixed
    {
        return $this->ProductKind;
    }

    public function getProductPolicies(): mixed
    {
        return $this->ProductPolicies;
    }

    public function getDisplaySkuAvailabilities(): array
    {
        return $this->DisplaySkuAvailabilities;
    }
}
