<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogSearchTitle
{
    public $SearchTitleString; //String
    public $SearchTitleType; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['SearchTitleString'])) {
            $this->SearchTitleString = $data['SearchTitleString'];
        }

        if (isset($data['SearchTitleType'])) {
            $this->SearchTitleType = $data['SearchTitleType'];
        }
    }

    public function getSearchTitleString()
    {
        return $this->SearchTitleString;
    }

    public function getSearchTitleType()
    {
        return $this->SearchTitleType;
    }
}
