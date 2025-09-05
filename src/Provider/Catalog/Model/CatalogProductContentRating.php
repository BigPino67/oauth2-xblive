<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductContentRating
{
    public $RatingSystem; //String
    public $RatingId; //String
    public $RatingDescriptors = array(); //Array
    public $RatingDisclaimers = array(); //Array
    public $InteractiveElements = array(); //Array

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['RatingSystem'])) {
            $this->RatingSystem = $data['RatingSystem'];
        }

        if (isset($data['RatingId'])) {
            $this->RatingId = $data['RatingId'];
        }

        if (isset($data['RatingDescriptors'])) {
            for($i=0; $i<count($data["RatingDescriptors"]); $i++)
            {
                array_push($this->RatingDescriptors, $data["RatingDescriptors"][$i]);
            }
        }

        if (isset($data['RatingDisclaimers'])) {
            for($i=0; $i<count($data["RatingDisclaimers"]); $i++)
            {
                array_push($this->RatingDisclaimers, $data["RatingDisclaimers"][$i]);
            }
        }

        if (isset($data['InteractiveElements'])) {
            for($i=0; $i<count($data["InteractiveElements"]); $i++)
            {
                array_push($this->InteractiveElements, $data["InteractiveElements"][$i]);
            }
        }
    }

    public function getRatingSystem()
    {
        return $this->RatingSystem;
    }

    public function getRatingId()
    {
        return $this->RatingId;
    }

    public function getRatingDescriptors()
    {
        return $this->RatingDescriptors;
    }

    public function getRatingDisclaimers()
    {
        return $this->RatingDisclaimers;
    }

    public function getInteractiveElements()
    {
        return $this->InteractiveElements;
    }
}
