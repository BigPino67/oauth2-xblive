<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductXbox
{
    public $XboxProperties; //String
    public $SubmissionId; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['XboxProperties'])) {
            $this->XboxProperties = $data['XboxProperties'];
        }

        if (isset($data['SubmissionId'])) {
            $this->SubmissionId = $data['SubmissionId'];
        }
    }

    public function getXboxProperties()
    {
        return $this->XboxProperties;
    }

    public function getSubmissionId()
    {
        return $this->SubmissionId;
    }
}
