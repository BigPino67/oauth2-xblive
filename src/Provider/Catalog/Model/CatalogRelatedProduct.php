<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogRelatedProduct
{
    public $RelatedProductId; //String
    public $RelationshipType; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['RelatedProductId'])) {
            $this->RelatedProductId = $data['RelatedProductId'];
        }

        if (isset($data['RelationshipType'])) {
            $this->RelationshipType = $data['RelationshipType'];
        }
    }

    public function getRelatedProductId()
    {
        return $this->RelatedProductId;
    }

    public function getRelationshipType()
    {
        return $this->RelationshipType;
    }
}
