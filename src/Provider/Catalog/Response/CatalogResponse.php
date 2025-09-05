<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Response;

use BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model\CatatalogProduct;

class CatalogResponse
{
    public $Products = array(); //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if(!isset($data["Products"]))
            throw new UnexpectedValueException(
                'XBOX Live service has returned invalid achievements data'
            );

        for($i=0; $i<count($data["Products"]); $i++)
        {
            array_push($this->Products, new CatatalogProduct($data["Products"][$i]));
        }
    }

    public function getProducts(): String
    {
        return $this->Products;
    }
}
