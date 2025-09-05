<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductValidationData
{
    public $PassedValidation; //Boolean
    public $RevisionId; //String
    public $ValidationResultUri; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['PassedValidation'])) {
            $this->PassedValidation = $data['PassedValidation'];
        }

        if (isset($data['RevisionId'])) {
            $this->RevisionId = $data['RevisionId'];
        }

        if (isset($data['ValidationResultUri'])) {
            $this->ValidationResultUri = $data['ValidationResultUri'];
        }
    }

    public function getPassedValidation()
    {
        return $this->PassedValidation;
    }

    public function getRevisionId()
    {
        return $this->RevisionId;
    }

    public function getValidationResultUri()
    {
        return $this->ValidationResultUri;
    }
}
