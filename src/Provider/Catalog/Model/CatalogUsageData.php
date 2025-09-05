<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogUsageData
{
    public $AggregateTimeSpan; //String
    public $AverageRating; //String
    public $PlayCount; //String
    public $RatingCount; //String
    public $RentalCount; //String
    public $TrialCount; //String
    public $PurchaseCount; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['AggregateTimeSpan'])) {
            $this->AggregateTimeSpan = $data['AggregateTimeSpan'];
        }

        if (isset($data['AverageRating'])) {
            $this->AverageRating = $data['AverageRating'];
        }

        if (isset($data['PlayCount'])) {
            $this->PlayCount = $data['PlayCount'];
        }

        if (isset($data['RatingCount'])) {
            $this->RatingCount = $data['RatingCount'];
        }

        if (isset($data['RentalCount'])) {
            $this->RentalCount = $data['RentalCount'];
        }

        if (isset($data['TrialCount'])) {
            $this->TrialCount = $data['TrialCount'];
        }

        if (isset($data['PurchaseCount'])) {
            $this->PurchaseCount = $data['PurchaseCount'];
        }
    }

    public function getAggregateTimeSpan()
    {
        return $this->AggregateTimeSpan;
    }

    public function getAverageRating()
    {
        return $this->AverageRating;
    }

    public function getPlayCount()
    {
        return $this->PlayCount;
    }

    public function getRatingCount()
    {
        return $this->RatingCount;
    }

    public function getRentalCount()
    {
        return $this->RentalCount;
    }

    public function getTrialCount()
    {
        return $this->TrialCount;
    }

    public function getPurchaseCount()
    {
        return $this->PurchaseCount;
    }
}
