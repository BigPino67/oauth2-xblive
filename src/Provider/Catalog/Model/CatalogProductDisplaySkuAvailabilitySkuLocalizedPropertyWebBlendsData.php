<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductDisplaySkuAvailabilitySkuLocalizedPropertyWebBlendsData
{
    public $ChargeFrequencyString; //String
    public $CustomWebBlendsText; //String
    public $Link; //String
    public $PurchaseEmailTemplate; //String
    public $TrialDurationString; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['ChargeFrequencyString'])) {
            $this->ChargeFrequencyString = $data['ChargeFrequencyString'];
        }

        if (isset($data['CustomWebBlendsText'])) {
            $this->CustomWebBlendsText = $data['CustomWebBlendsText'];
        }

        if (isset($data['Link'])) {
            $this->Link = $data['Link'];
        }

        if (isset($data['PurchaseEmailTemplate'])) {
            $this->PurchaseEmailTemplate = $data['PurchaseEmailTemplate'];
        }

        if (isset($data['TrialDurationString'])) {
            $this->TrialDurationString = $data['TrialDurationString'];
        }
    }

    public function getChargeFrequencyString()
    {
        return $this->ChargeFrequencyString;
    }

    public function getCustomWebBlendsText()
    {
        return $this->CustomWebBlendsText;
    }

    public function getLink()
    {
        return $this->Link;
    }

    public function getPurchaseEmailTemplate()
    {
        return $this->PurchaseEmailTemplate;
    }

    public function getTrialDurationString()
    {
        return $this->TrialDurationString;
    }
}
