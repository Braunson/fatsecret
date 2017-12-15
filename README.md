FatSecret API for Laravel
============================

The FatSecret API for Laravel gives you access to the FatSecret API.
[![StyleCI](https://styleci.io/repos/107026275/shield?branch=laravel5)](https://styleci.io/repos/107026275)

[FatSecret](http://platform.fatsecret.com/api) provides you with access to comprehensive nutrition data for many thousands of foods, not to mention a range exercises and great weight management tools for your applications.
[![Build Status](https://travis-ci.org/namelivia/fatsecret-laravel.svg?branch=laravel5)](https://travis-ci.org/namelivia/fatsecret-laravel)

Looking for 4.x Compatability?
-------------
While it may be unsupported now, you can find 4.x compatible versions in the `laravel4` branch or tagged with `4.0`

How to Install
--------------

1.  Install the `braunson/fatsecret-laravel` package

	```shell
	$ composer require "braunson/fatsecret-laravel"
	```

2.  Update `config/app.php` to activate FatSecret package

	```php
	# Add `FatSecretServiceProvider` to the `providers` array
	'providers' => [
		...
		Braunson\FatSecret\ServiceProvider::class,
	]

	# Add the FatSecret Facade to the `aliases` array
	'aliases' => [
		...
		'FatSecret' => Braunson\FatSecret\Facades\Facade::class,
	]
	```


Configuration
-------------

1. Publish the config file:

	```
	php artisan vendor:publish --provider="Braunson\FatSecret\ServiceProvider"
	```

2. Go to recently created `config/fatsecret.php` file and add this in with your details in the provided array

	```php
	// API Key & Secret (http://platform.fatsecret.com)
    return [
			'key' => 'YOUR-API-KEY',
			'secret' => 'YOUR-API-SECRET'
    ],
	```

Usage
------------------------

When you are using this package in a file, make sure to add this to the top of your file:

```php
use Fatsecret;
```

The FatSecret is available as `FatSecret`, for example:

```php
FatSecret::ProfileCreate($userID, &$token, &$secret);
```

For more information on using the FatSecret API check out the [documentation](http://platform.fatsecret.com/api/)

Methods
------------------------

```php
FatSecret::searchIngredients($search_phrase, $page, $maxresults)
```
- Search ingredients by phrase, page and max results

```php
FatSecret::getIngredient($ingredient_id)
```
- Retrieve an ingredient by ID

```php
FatSecret::GetKey()
```
- Gets the set consumer key

```php
FatSecret::SetKey()
```
- Allows overriding or setting of the consumer key

```php
FatSecret::GetSecret()
```
- Gets the set secret key

```php
FatSecret::SetSecret()
```
- Allows overriding or setting of the secret key

```php
FatSecret::ProfileCreate($userID, $token, $secret)
```
- Allows creation of a profile in FS with a user specific ID.

```php
FatSecret::ProfileGetAuth($userID, $token, $secret)
```
- Get the authentication details of a profile

```php
FatSecret::ProfileRequestScriptSessionKey($auth, $expires, $consumeWithin, $permittedReferrerRegex, $cookie, $sessionKey)
```
- Create a new session for JavaScript API users





Reporting Bugs or Feature Requests
----------------------------------

Please report any bugs or feature requests on the github issues page for this project here:

<https://github.com/braunson/fatsecret/issues>


Contributing
------------

-   [Fork](https://help.github.com/articles/fork-a-repo) the [FatSecret on github](https://github.com/braunson/fatsecret)
-   Commit and push until you are happy with your contribution
-   Run the tests to make sure they all pass: `composer install && ./vendor/bin/phpunit`
-   [Make a pull request](https://help.github.com/articles/using-pull-requests)
-   Thanks!


License
-------

The FatSecret Laravel API is free software released under the MIT License.
See [LICENSE](https://github.com/braunson/fatsecret/blob/master/LICENSE) for details. This is not an official release and is released separately from FatSecret.
