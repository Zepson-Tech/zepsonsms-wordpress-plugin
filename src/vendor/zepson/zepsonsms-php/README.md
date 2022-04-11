# ZepsonSMS PHP SDK

## Installation

You can install the package via composer:

```bash
composer require zepsonsms/php-client
```

## Usage

```php
$zepson = new ZepsonSms\SDK\Client('username', 'password');
echo $zepson->sendSms([
    'message'=>'Hello, ZepsonSms!',
    'to'=>'+380988123456',
    'from'=>'ZEPSONSMS'
]);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Alpha Olomi](https://github.com/alphaolomi)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
