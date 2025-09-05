<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilitySkuLocalizedPropertyLegalText
{
    public $AdditionalLicenseTerms; //String
    public $Copyright; //String
    public $CopyrightUri; //String
    public $PrivacyPolicy; //String
    public $PrivacyPolicyUri; //String
    public $Tou; //String
    public $TouUri; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['AdditionalLicenseTerms'])) {
            $this->AdditionalLicenseTerms = $data['AdditionalLicenseTerms'];
        }

        if (isset($data['Copyright'])) {
            $this->Copyright = $data['Copyright'];
        }

        if (isset($data['CopyrightUri'])) {
            $this->CopyrightUri = $data['CopyrightUri'];
        }

        if (isset($data['PrivacyPolicy'])) {
            $this->PrivacyPolicy = $data['PrivacyPolicy'];
        }

        if (isset($data['PrivacyPolicyUri'])) {
            $this->PrivacyPolicyUri = $data['PrivacyPolicyUri'];
        }

        if (isset($data['Tou'])) {
            $this->Tou = $data['Tou'];
        }

        if (isset($data['TouUri'])) {
            $this->TouUri = $data['TouUri'];
        }
    }

    public function getAdditionalLicenseTerms()
    {
        return $this->AdditionalLicenseTerms;
    }

    public function getCopyright()
    {
        return $this->Copyright;
    }

    public function getCopyrightUri()
    {
        return $this->CopyrightUri;
    }

    public function getPrivacyPolicy()
    {
        return $this->PrivacyPolicy;
    }

    public function getPrivacyPolicyUri()
    {
        return $this->PrivacyPolicyUri;
    }

    public function getTou()
    {
        return $this->Tou;
    }

    public function getTouUri()
    {
        return $this->TouUri;
    }
}
