<?php

namespace BigPino67\OAuth2\XBLive\Client\Token;


use InvalidArgumentException;
use League\OAuth2\Client\Tool\RequestFactory;
use RuntimeException;

class AccessToken extends \League\OAuth2\Client\Token\AccessToken
{
    protected $expiresIn;

    public function __construct(array $options = [])
    {
        if (empty($options['access_token'])) {
            throw new InvalidArgumentException('Required option not passed: "access_token"');
        }

        $this->accessToken = $options['access_token'];

        if (!empty($options['resource_owner_id'])) {
            $this->resourceOwnerId = $options['resource_owner_id'];
        }

        if (!empty($options['refresh_token'])) {
            $this->refreshToken = $options['refresh_token'];
        }
		
		

        // We need to know when the token expires. Show preference to
        // 'expires_in' since it is defined in RFC6749 Section 5.1.
        // Defer to 'expires' if it is provided instead.
        if (isset($options['expires_in'])) {
            if (!is_numeric($options['expires_in'])) {
                throw new \InvalidArgumentException('expires_in value must be an integer');
            }

            $this->expiresIn = $options['expires_in'];
            $this->expires = $options['expires_in'] != 0 ? $this->getTimeNow() + $options['expires_in'] : 0;
        } elseif (!empty($options['expires'])) {
            // Some providers supply the seconds until expiration rather than
            // the exact timestamp. Take a best guess at which we received.
            $expires = $options['expires'];

            if (!$this->isExpirationTimestamp($expires)) {
                $expires += $this->getTimeNow();
            }

            $this->expires = $expires;
        }

        // Capture any additional values that might exist in the token but are
        // not part of the standard response. Vendors will sometimes pass
        // additional user data this way.
        $this->values = array_diff_key($options, array_flip([
            'access_token',
            'resource_owner_id',
            'refresh_token',
            'expires_in',
            'expires',
        ]));
    }
	
	public function getExpiresIn()
    {
        return $this->expiresIn;
    }
}