# deesynertz/laravel-wallet

## Features

### Installation

Using Composer run

```php
composer require deesynertz/laravel-wallet
```

### Laravel >= 5.5

That's it! The package is auto-discovered on 5.5 and up!

### Laravel <= 5.4

Add the service provider to the `providers` array in your `config/app.php` file:

```php
'providers' => [
    // Other Laravel service providers...

    /*
    * Package Service Providers...
    */
    Deesynertz\Location\WalletServiceProvider::class,

    // Other package service providers...
],
```

for aut publish add this into you project `composer.json` on `scripts` section

```php
    // Other post-autoload-dump...

    "scripts": {
        "post-install-cmd": [
            "@php artisan vendor:publish --tag=deesynertz-wallet-config --force",
            "@php artisan vendor:publish --tag=deesynertz-wallet-migrations --force",
            "@php artisan vendor:publish --tag=deesynertz-wallet-helpers --force"
        ]
    },
```

### Usage

## Contributions

Contributions and feedback are welcome! Feel free to open an issue or submit a pull request on GitHub.

## License

This package is open-source software licensed under the [MIT](https://github.com/deesynertz/laravel-wallet/blob/master/LICENSE) license.
