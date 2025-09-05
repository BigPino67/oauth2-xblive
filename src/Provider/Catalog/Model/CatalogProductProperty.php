<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductProperty
{
    public $Category; //String
    public $Categories = array(); //Array
    public $IsOmexProduct; //Boolean
    public $PackageFamilyName; //String
    public $PackageIdentityName; //String
    public $PrimaryCategory; //String
    public $PublisherCertificateName; //String
    public $PublisherId; //String
    public $Subcategory; //String
    public $XboxXPA; //String
    public $Attributes = array(); //Array
    public $SkuDisplayGroups = array(); //Array
    public $XboxCrossGenSetId; //String
    public $XboxConsoleGenOptimized = array(); //Array
    public $XboxConsoleGenCompatible = array(); //Array
    public $XboxLiveGoldRequired; //String
    public $XBOX; //Object
    public $ExtendedClientMetadata = array(); //Array
    public $OwnershipType; //String
    public $PdpBackgroundColor; //String
    public $HasAddOns; //String
    public $RevisionId; //String
    public $EntitlementProperties = array(); //Array
    public $ProductGroupId; //String
    public $ProductGroupName; //String
    public $InAppOfferToken; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['Category'])) {
            $this->Category = $data['Category'];
        }

        if (isset($data['Categories'])) {
            for($i=0; $i<count($data["Categories"]); $i++)
            {
                array_push($this->Categories, $data["Categories"][$i]);
            }
        }

        if (isset($data['IsOmexProduct'])) {
            $this->IsOmexProduct = $data['IsOmexProduct'];
        }

        if (isset($data['PackageFamilyName'])) {
            $this->PackageFamilyName = $data['PackageFamilyName'];
        }

        if (isset($data['PackageIdentityName'])) {
            $this->PackageIdentityName = $data['PackageIdentityName'];
        }

        if (isset($data['PrimaryCategory'])) {
            $this->PrimaryCategory = $data['PrimaryCategory'];
        }

        if (isset($data['PublisherCertificateName'])) {
            $this->PublisherCertificateName = $data['PublisherCertificateName'];
        }

        if (isset($data['PublisherId'])) {
            $this->PublisherId = $data['PublisherId'];
        }

        if (isset($data['Subcategory'])) {
            $this->Subcategory = $data['Subcategory'];
        }

        if (isset($data['XboxXPA'])) {
            $this->XboxXPA = $data['XboxXPA'];
        }

        if (isset($data['Attributes'])) {
            //var_dump($data["Attributes"][0]);
            for($i=0; $i<count($data["Attributes"]); $i++)
            {
                array_push($this->Attributes, new CatalogProductPropertyAttribute($data["Attributes"][$i]));
            }
        }

        if (isset($data['SkuDisplayGroups'])) {
            for($i=0; $i<count($data["SkuDisplayGroups"]); $i++)
            {
                array_push($this->SkuDisplayGroups, new CatalogSkuDisplayGroup($data["SkuDisplayGroups"][$i]));
            }
        }

        if (isset($data['XboxCrossGenSetId'])) {
            $this->XboxCrossGenSetId = $data['XboxCrossGenSetId'];
        }

        if (isset($data['XboxConsoleGenOptimized'])) {
            for($i=0; $i<count($data["XboxConsoleGenOptimized"]); $i++)
            {
                array_push($this->XboxConsoleGenOptimized, $data["XboxConsoleGenOptimized"][$i]);
            }
        }

        if (isset($data['XboxConsoleGenCompatible'])) {
            for($i=0; $i<count($data["XboxConsoleGenCompatible"]); $i++)
            {
                array_push($this->XboxConsoleGenCompatible, $data["XboxConsoleGenCompatible"][$i]);
            }
        }

        if (isset($data['XboxLiveGoldRequired'])) {
            $this->XboxLiveGoldRequired = $data['XboxLiveGoldRequired'];
        }

        if (isset($data['XBOX'])) {
            $this->XBOX = new CatalogProductXbox($data['XBOX']);
        }

        if (isset($data['ExtendedClientMetadata'])) {
            //@TODO not found any title with this property fulled
            $this->ExtendedClientMetadata = $data['ExtendedClientMetadata'];
        }

        if (isset($data['OwnershipType'])) {
            $this->OwnershipType = $data['OwnershipType'];
        }

        if (isset($data['PdpBackgroundColor'])) {
            $this->PdpBackgroundColor = $data['PdpBackgroundColor'];
        }

        if (isset($data['HasAddOns'])) {
            $this->HasAddOns = $data['HasAddOns'];
        }

        if (isset($data['RevisionId'])) {
            $this->RevisionId = $data['RevisionId'];
        }

        if (isset($data['EntitlementProperties'])) {
            for($i=0; $i<count($data["EntitlementProperties"]); $i++)
            {
                array_push($this->EntitlementProperties, $data["EntitlementProperties"][$i]);
            }
        }

        if (isset($data['ProductGroupId'])) {
            $this->ProductGroupId = $data['ProductGroupId'];
        }

        if (isset($data['ProductGroupName'])) {
            $this->ProductGroupName = $data['ProductGroupName'];
        }

        if (isset($data['InAppOfferToken'])) {
            $this->InAppOfferToken = $data['InAppOfferToken'];
        }
    }

    public function getCategory()
    {
        return $this->Category;
    }

    public function getCategories()
    {
        return $this->Categories;
    }

    public function getIsOmexProduct()
    {
        return $this->IsOmexProduct;
    }

    public function getPackageFamilyName()
    {
        return $this->PackageFamilyName;
    }

    public function getPackageIdentityName()
    {
        return $this->PackageIdentityName;
    }

    public function getPrimaryCategory()
    {
        return $this->PrimaryCategory;
    }

    public function getPublisherCertificateName()
    {
        return $this->PublisherCertificateName;
    }

    public function getPublisherId()
    {
        return $this->PublisherId;
    }

    public function getSubcategory()
    {
        return $this->Subcategory;
    }

    public function getXboxXPA()
    {
        return $this->XboxXPA;
    }

    public function getAttributes()
    {
        return $this->Attributes;
    }

    public function getSkuDisplayGroups()
    {
        return $this->SkuDisplayGroups;
    }

    public function getXboxCrossGenSetId()
    {
        return $this->XboxCrossGenSetId;
    }

    public function getXboxConsoleGenOptimized()
    {
        return $this->XboxConsoleGenOptimized;
    }

    public function getXboxConsoleGenCompatible()
    {
        return $this->XboxConsoleGenCompatible;
    }

    public function getXboxLiveGoldRequired()
    {
        return $this->XboxLiveGoldRequired;
    }

    public function getXBOX(): CatalogProductXbox
    {
        return $this->XBOX;
    }

    public function getExtendedClientMetadata()
    {
        return $this->ExtendedClientMetadata;
    }

    public function getOwnershipType()
    {
        return $this->OwnershipType;
    }

    public function getPdpBackgroundColor()
    {
        return $this->PdpBackgroundColor;
    }

    public function getHasAddOns()
    {
        return $this->HasAddOns;
    }

    public function getRevisionId()
    {
        return $this->RevisionId;
    }

    public function getEntitlementProperties()
    {
        return $this->EntitlementProperties;
    }

    public function getProductGroupId()
    {
        return $this->ProductGroupId;
    }

    public function getProductGroupName()
    {
        return $this->ProductGroupName;
    }

    public function getInAppOfferToken()
    {
        return $this->InAppOfferToken;
    }
}
