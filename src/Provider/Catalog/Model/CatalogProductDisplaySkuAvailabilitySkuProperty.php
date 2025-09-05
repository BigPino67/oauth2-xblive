<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilitySkuProperty
{
    public $ApplicableLegacyPlatforms;
    public $CustomDeveloperData;
    public $MagazineIssueData;
    public $Packages;
    public $FulfillmentData;
    public $FulfillmentType;
    public $FulfillmentPluginId;
    public $XboxXPA;
    public $HardwareProperties;
    public $HardwareRequirements;
    public $HardwareWarningList;
    public $SkuDisplayGroupIds;
    public $EarlyAdopterEnrollmentUrl;
    public $HasThirdPartyIAPs;
    public $InstallationTerms;
    public $LastUpdateDate;
    public $VersionString;
    public $BundledSkus;
    public $IsRepurchasable;
    public $SkuDisplayRank;
    public $DisplayPhysicalStoreInventory;
    public $VisibleToB2BServiceIds;
    public $AdditionalIdentifiers;
    public $IsTrial;
    public $IsPreOrder;
    public $IsBundle;

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['ApplicableLegacyPlatforms'])) {
            $this->ApplicableLegacyPlatforms = $data['ApplicableLegacyPlatforms'];
        }

        if (isset($data['CustomDeveloperData'])) {
            $this->CustomDeveloperData = $data['CustomDeveloperData'];
        }

        if (isset($data['MagazineIssueData'])) {
            $this->MagazineIssueData = $data['MagazineIssueData'];
        }

        if (isset($data['Packages'])) {
            $this->Packages = $data['Packages'];
        }

        if (isset($data['FulfillmentData'])) {
            $this->FulfillmentData = $data['FulfillmentData'];
        }

        if (isset($data['FulfillmentType'])) {
            $this->FulfillmentType = $data['FulfillmentType'];
        }

        if (isset($data['FulfillmentPluginId'])) {
            $this->FulfillmentPluginId = $data['FulfillmentPluginId'];
        }

        if (isset($data['XboxXPA'])) {
            $this->XboxXPA = $data['XboxXPA'];
        }

        if (isset($data['HardwareProperties'])) {
            $this->HardwareProperties = $data['HardwareProperties'];
        }

        if (isset($data['HardwareRequirements'])) {
            $this->HardwareRequirements = $data['HardwareRequirements'];
        }

        if (isset($data['HardwareWarningList'])) {
            $this->HardwareWarningList = $data['HardwareWarningList'];
        }

        if (isset($data['SkuDisplayGroupIds'])) {
            $this->SkuDisplayGroupIds = $data['SkuDisplayGroupIds'];
        }

        if (isset($data['EarlyAdopterEnrollmentUrl'])) {
            $this->EarlyAdopterEnrollmentUrl = $data['EarlyAdopterEnrollmentUrl'];
        }

        if (isset($data['HasThirdPartyIAPs'])) {
            $this->HasThirdPartyIAPs = $data['HasThirdPartyIAPs'];
        }

        if (isset($data['InstallationTerms'])) {
            $this->InstallationTerms = $data['InstallationTerms'];
        }

        if (isset($data['LastUpdateDate'])) {
            $this->LastUpdateDate = $data['LastUpdateDate'];
        }

        if (isset($data['VersionString'])) {
            $this->VersionString = $data['VersionString'];
        }

        if (isset($data['BundledSkus'])) {
            $this->BundledSkus = $data['BundledSkus'];
        }

        if (isset($data['IsRepurchasable'])) {
            $this->IsRepurchasable = $data['IsRepurchasable'];
        }

        if (isset($data['SkuDisplayRank'])) {
            $this->SkuDisplayRank = $data['SkuDisplayRank'];
        }

        if (isset($data['DisplayPhysicalStoreInventory'])) {
            $this->DisplayPhysicalStoreInventory = $data['DisplayPhysicalStoreInventory'];
        }

        if (isset($data['VisibleToB2BServiceIds'])) {
            $this->VisibleToB2BServiceIds = $data['VisibleToB2BServiceIds'];
        }

        if (isset($data['AdditionalIdentifiers'])) {
            $this->AdditionalIdentifiers = $data['AdditionalIdentifiers'];
        }

        if (isset($data['IsTrial'])) {
            $this->IsTrial = $data['IsTrial'];
        }

        if (isset($data['IsPreOrder'])) {
            $this->IsPreOrder = $data['IsPreOrder'];
        }

        if (isset($data['IsBundle'])) {
            $this->IsBundle = $data['IsBundle'];
        }
    }

    public function getApplicableLegacyPlatforms()
    {
        return $this->ApplicableLegacyPlatforms;
    }

    public function getCustomDeveloperData()
    {
        return $this->CustomDeveloperData;
    }

    public function getMagazineIssueData()
    {
        return $this->MagazineIssueData;
    }

    public function getPackages()
    {
        return $this->Packages;
    }

    public function getFulfillmentData()
    {
        return $this->FulfillmentData;
    }

    public function getFulfillmentType()
    {
        return $this->FulfillmentType;
    }

    public function getFulfillmentPluginId()
    {
        return $this->FulfillmentPluginId;
    }

    public function getXboxXPA()
    {
        return $this->XboxXPA;
    }

    public function getHardwareProperties()
    {
        return $this->HardwareProperties;
    }

    public function getHardwareRequirements()
    {
        return $this->HardwareRequirements;
    }

    public function getHardwareWarningList()
    {
        return $this->HardwareWarningList;
    }

    public function getSkuDisplayGroupIds()
    {
        return $this->SkuDisplayGroupIds;
    }

    public function getEarlyAdopterEnrollmentUrl()
    {
        return $this->EarlyAdopterEnrollmentUrl;
    }

    public function getHasThirdPartyIAPs()
    {
        return $this->HasThirdPartyIAPs;
    }

    public function getInstallationTerms()
    {
        return $this->InstallationTerms;
    }

    public function getLastUpdateDate()
    {
        return $this->LastUpdateDate;
    }

    public function getVersionString()
    {
        return $this->VersionString;
    }

    public function getBundledSkus()
    {
        return $this->BundledSkus;
    }

    public function getIsRepurchasable()
    {
        return $this->IsRepurchasable;
    }

    public function getSkuDisplayRank()
    {
        return $this->SkuDisplayRank;
    }

    public function getDisplayPhysicalStoreInventory()
    {
        return $this->DisplayPhysicalStoreInventory;
    }

    public function getVisibleToB2BServiceIds()
    {
        return $this->VisibleToB2BServiceIds;
    }

    public function getAdditionalIdentifiers()
    {
        return $this->AdditionalIdentifiers;
    }

    public function getIsTrial()
    {
        return $this->IsTrial;
    }

    public function getIsPreOrder()
    {
        return $this->IsPreOrder;
    }

    public function getIsBundle()
    {
        return $this->IsBundle;
    }
}
