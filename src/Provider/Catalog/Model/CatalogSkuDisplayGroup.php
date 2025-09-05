<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogSkuDisplayGroup
{
    public $Id; //String
    public $Treatment; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['Id'])) {
            $this->Id = $data['Id'];
        }

        if (isset($data['Treatment'])) {
            $this->Treatment = $data['Treatment'];
        }
    }

    public function getId()
    {
        return $this->Id;
    }

    public function getTreatment()
    {
        return $this->Treatment;
    }
}
