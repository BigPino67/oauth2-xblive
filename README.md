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
	
	$profilesProvider = new Provider\Profiles\ProfilesProvider($xstsToken);
	$profile = $profilesProvider->getLoggedUserProfile();
	
	$achivementsProvider = new Provider\Achievements\AchievementsProvider($xstsToken);
	$sotAchievements = $achivementsProvider->getAchievements(XboxOneTitleEnum::SeaOfThieves);
		
        echo "<pre>";
        print_r($sotAchievements);
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

 ## Examples

With this library, you can build a web page that looks like this :
![alt text](https://github.com/BigPino67/oauth2-xblive/blob/master/examples/Profile.jpg?raw=true)
![alt text](https://github.com/BigPino67/oauth2-xblive/blob/master/examples/TitleAchievements.jpg?raw=true)
![alt text](https://github.com/BigPino67/oauth2-xblive/blob/master/examples/Friends.jpg?raw=true)
![alt text](https://github.com/BigPino67/oauth2-xblive/blob/master/examples/Profile_Friend.jpg?raw=true)
![alt text](https://github.com/BigPino67/oauth2-xblive/blob/master/examples/TitleAchievements_Friend.jpg?raw=true)
