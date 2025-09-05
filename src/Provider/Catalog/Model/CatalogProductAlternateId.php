<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductAlternateId
{
    public $IdType; //String
    public $Value; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['IdType'])) {
            $this->IdType = $data['IdType'];
        }

        if (isset($data['Value'])) {
            $this->Value = $data['Value'];
        }
    }

    public function getIdType()
    {
        return $this->IdType;
    }

    public function getValue()
    {
        return $this->Value;
    }
}
