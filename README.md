# GLS SDK for JSON REST API
[![Build Status](https://travis-ci.com/webapix/mygls-sdk.svg?branch=master)](https://travis-ci.com/webapix/mygls-sdk)
[![StyleCI](https://github.styleci.io/repos/295666140/shield?branch=master)](https://github.styleci.io/repos/295666140?branch=master)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)


An unofficial lightweight PHP SDK for the MyGLS REST API.

## Installation

You can install the package via composer:

```bash
composer require webapix/mygls-sdk
```

## Usage

``` php
use GuzzleHttp\Client as HttpClient;
use Webapix\GLS\Client;
use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Services\SMS;
use Webapix\GLS\Requests\PrintLabels;

$parcel = (new Parcel)
    ->setClientNumber(123456789)
    ->setPickupAddress(<class that extends \Webapix\GLS\Contracts\Address>)
    ->setDeliveryInfo(<class that extends \Webapix\GLS\Contracts\Contact>)
    ->when($order->cutomerWantsSmsAlert(), function (Parcel $parcel) use ($order) {
        return $parcel->addService(
            new SMS($order->phone_number, 'Your package (#ParcelNr#) is on its way to GLS facility!')
        );
    });

$client = new Client(new HttpClient);

$request = PrintLabels;
$request->addParcel($parcel);

/** @var \Webapix\GLS\Responses\PrintLabels $response */
$response = $client->on($account)->request($request);

if ($response->successfull()) {

    // get the pdf
    $response->getPdf()
}
```

You can find more information and examples in our [wiki](https://github.com/webapix/mygls-sdk/wiki).

## Docs
[Package docs](https://github.com/webapix/mygls-sdk/wiki)   
[Official GLS Docs](https://api.mygls.hu/)

## Testing

``` bash
composer test
```

## Postcardware
According to the postcardware concept, if you use the software for your project(s) we would appreciate to receive a postcard of your hometown.

Please send it to:

WEBAPIX KFT.   
PF.: 941   
1535 Budapest   
Hungary

## Support us

If you find our packages useful and would like to support our work in maintaining and regularly updating them, consider becoming a patron. Any size of donation is welcome and highly appreciated.

## Contributing

Contributions are welcome! When contributing to this repository, please first discuss the change you wish to make via issue, email, or any other method with the owners of this repository before making a change.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email pdo@webapix.hu instead of using the issue tracker.

## Credits

- [WEBAPIX Kft.](https://webapix.hu)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.