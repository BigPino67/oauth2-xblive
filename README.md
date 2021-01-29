# XBOX Live provider for OAuth2 Client
 This package provides Microsoft Live and XBOX Live OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).
 
 ## Installation

To install, use composer:

```
composer require bigpino67/oauth2-xblive dev-master
```

### Authorization Code Flow

```php
require_once __DIR__ . '/vendor/autoload.php';


use BigPino67\OAuth2\XBLive\Client\Provider;
use BigPino67\OAuth2\XBLive\Client\Provider\Enum\XBLivePlatformEnum;
use BigPino67\OAuth2\XBLive\Client\Provider\Enum\XboxOneTitleEnum;

$provider = new BigPino67\OAuth2\XBLive\Client\Provider\XBLive([
    'clientId'          => '{YOUR_CLIENT_ID}',
    'clientSecret'      => '{YOUR_CLIENT_SECRET}',
    'redirectUri'       => '{YOUR_LOGIN_REDIRECT_URI}',
    'logoutRedirectUri' => '{YOUR_LOGOUT_REDIRECT_URI}',
    'state'             => '{YOUR_UNIQUE_STATE_HASH}'
]);

if(isset($_POST['code']) && isset($_POST['state']))
{
    if($_POST['state'] == $provider->getState())
    {
        $msaToken = $provider->GetAccessToken('authorization_code', [
            'scope' => $provider->scope,
            'code' => $_POST['code']
        ]);
		
        $xasuToken = $provider->getXasuToken($msaToken);
        $xstsToken = $provider->getXstsToken($xasuToken);
		
        $profile = $provider->getLoggedUserProfile($xstsToken);
		
        //BUILD XBLivePlatformEnum and replace with this code
        //$provider->printLoggedUserListOfTitleIds($xstsToken, XBLivePlatformEnum::XboxOne);
		
        echo "<pre>";
        print_r($provider->getAchievements($xstsToken, XboxOneTitleEnum::SeaOfThieves));
        echo "<pre>";
    } 
    else
    {
        echo 'Invalid state';
    }
} 
else
{
    echo '<a href="'.$provider->getBaseAuthorizationUrl().'">Login</a>';
}
```