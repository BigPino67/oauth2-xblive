<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductPropertyAttribute
{
    public $Name; //String
    public $Minimum; //String
    public $Maximum; //Boolean
    public $ApplicablePlatforms; //String
    public $Group; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['Name'])) {
            $this->Name = $data['Name'];
        }

        if (isset($data['Minimum'])) {
            $this->Minimum = $data['Minimum'];
        }

        if (isset($data['Maximum'])) {
            $this->Maximum = $data['Maximum'];
        }

        if (isset($data['ApplicablePlatforms'])) {
            $this->ApplicablePlatforms = $data['ApplicablePlatforms'];
        }

        if (isset($data['Group'])) {
            $this->Group = $data['Group'];
        }
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getMinimum()
    {
        return $this->Minimum;
    }

    public function getMaximum()
    {
        return $this->Maximum;
    }

    public function getApplicablePlatforms()
    {
        return $this->ApplicablePlatforms;
    }

    public function getGroup()
    {
        return $this->Group;
    }
}
