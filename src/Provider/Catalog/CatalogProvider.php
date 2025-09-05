<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog;

use BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Response\CatalogResponse;
use BigPino67\OAuth2\XBLive\Client\Provider\XBLive;
use BigPino67\OAuth2\XBLive\Client\Token\XBLiveXstsToken;

class CatalogProvider extends XBLive
{
    /*XBOX Live API URI for this provider*/
    private $urlXBLiveApiCatalog = "https://displaycatalog.mp.microsoft.com";
    private $listSeparator = ",";

    public function __construct(array $collaborators = [])
    {
        parent::__construct([], $collaborators);
    }

    public function getProducts(Array $bigIds, String $locale = "en-US", String $market = "US")
    {
        $queryParams = array();
        $queryParams["actionFilter"] = "Browse";
        $queryParams["bigIds"] = implode($this->listSeparator, $bigIds);
        $queryParams["fieldsTemplate"] = "details";
        $queryParams["languages"] = $locale;
        $queryParams["market"] = strtoupper($market);

        $requestUrl = $this->urlXBLiveApiCatalog . "/v7.0/products?";
        $requestUrl .= http_build_query($queryParams);

        $response = $this->fetchXBLiveTokensDetails(self::METHOD_GET, $requestUrl);

        return new CatalogResponse($response);
    }
}
