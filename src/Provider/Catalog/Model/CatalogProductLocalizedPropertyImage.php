<?php

namespace BigPino67\OAuth2\XBLive\Client\Provider\Catalog\Model;

class CatalogProductLocalizedPropertyImage
{
    public $FileId; //String
    public $EISListingIdentifier; //String
    public $BackgroundColor; //String
    public $Caption; //String
    public $FileSizeInBytes; //String
    public $ForegroundColor; //String
    public $Height; //String
    public $ImagePositionInfo; //String
    public $ImagePurpose; //String
    public $UnscaledImageSHA256Hash; //String
    public $Uri; //String
    public $Width; //String

    public function __construct($data = [])
    {
        if(count($data) == 0)
            throw new UnexpectedValueException(
                'XBOX Live service has returned no achievements data'
            );

        if (isset($data['FileId'])) {
            $this->FileId = $data['FileId'];
        }

        if (isset($data['EISListingIdentifier'])) {
            $this->EISListingIdentifier = $data['EISListingIdentifier'];
        }

        if (isset($data['BackgroundColor'])) {
            $this->BackgroundColor = $data['BackgroundColor'];
        }

        if (isset($data['Caption'])) {
            $this->Caption = $data['Caption'];
        }

        if (isset($data['FileSizeInBytes'])) {
            $this->FileSizeInBytes = $data['FileSizeInBytes'];
        }

        if (isset($data['ForegroundColor'])) {
            $this->ForegroundColor = $data['ForegroundColor'];
        }

        if (isset($data['Height'])) {
            $this->Height = $data['Height'];
        }

        if (isset($data['ImagePositionInfo'])) {
            $this->ImagePositionInfo = $data['ImagePositionInfo'];
        }

        if (isset($data['ImagePurpose'])) {
            $this->ImagePurpose = $data['ImagePurpose'];
        }

        if (isset($data['UnscaledImageSHA256Hash'])) {
            $this->UnscaledImageSHA256Hash = $data['UnscaledImageSHA256Hash'];
        }

        if (isset($data['Uri'])) {
            $this->Uri = $data['Uri'];
        }

        if (isset($data['Width'])) {
            $this->Width = $data['Width'];
        }
    }

    public function getCaption()
    {
        return $this->Caption;
    }

    public function getHeight()
    {
        return $this->Height;
    }

    public function getImagePurpose()
    {
        return $this->ImagePurpose;
    }

    public function getUri()
    {
        return $this->Uri;
    }

    public function getWidth()
    {
        return $this->Width;
    }
}
