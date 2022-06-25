
# Filament Google Maps Picker

[![Latest Version on Packagist](https://img.shields.io/packagist/v/emiliobravo/filament-google-maps-picker.svg?style=flat-square)](https://packagist.org/packages/emiliobravo/filament-google-maps-picker)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/emiliobravo/filament-google-maps-picker/run-tests?label=tests)](https://github.com/emiliobravo/filament-google-maps-picker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/emiliobravo/filament-google-maps-picker/Check%20&%20fix%20styling?label=code%20style)](https://github.com/emiliobravo/filament-google-maps-picker/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/emiliobravo/filament-google-maps-picker.svg?style=flat-square)](https://packagist.org/packages/emiliobravo/filament-google-maps-picker)

A Filament Field to get coordinates based on Google Maps.


## Installation

You can install the package via composer:

```bash
composer require emiliobravo/filament-google-maps-picker
```

You must define an environment variable `GOOGLE_MAPS_API_KEY` in your .env file with your [Google Maps API Key](https://developers.google.com/maps/documentation/embed/get-api-key#:~:text=Go%20to%20the%20Google%20Maps%20Platform%20%3E%20Credentials%20page.&text=On%20the%20Credentials%20page%2C%20click,Click%20Close.)

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-google-maps-picker-config"
```

This is the contents of the published config file:

```php
return [
    'google_maps_key' => env('GOOGLE_MAPS_API_KEY')
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-google-maps-picker-views"
```

## Usage

### On your filament resource file
```php
use EmilioBravo\FilamentGoogleMapsPicker\Forms\Components\LocationPicker;
```

### On your filament form schema
```php
        LocationPicker::make('location')
```

This will display a simple Google Maps field with a marker in latitude 0 and longitude 0. When you click on the map, the field value and the marker positions uptades to the new coordinates.

![Example 1](https://github.com/EmilioBravo/filament-google-maps-picker/blob/master/resources/readme/example1.jpg?raw=true)


## Enabling Google Maps controls

Use this methods to enable Google Maps controls:

`zoomControl(bool)` (default: false) displays de zoom controls allow the user to change it
`mapTypeControl(bool)` (default: false) displays the map type selection control
`scaleControl(bool)` (default: false)  displays the map scale control
`streetViewControl(bool)` (default: false) displays the map StreetView control
`fullScreenControl(bool)` (default: false) displays the full screen control
`rotateControl(bool)` (default: false) displays the rotation control
`searchBoxControl(bool)` (default: false) displays search box control to search for locations. Will update the field value upon selection
`geolocationControl(bool)` (default: false) custom control to get the device geolocation and update the map position with it. It required the user to allow the device permission to access geolocation data
`coordsBoxControl(bool)` (default: false) custom control that shows a text input with current value of the field in the format latitude,longitude

## Options

`zoom(int)` (default: 1) takes an integer as value and sets the initial zoom of the map 
`minHeight(string)` (default: 50vh) accepts a string to set the map height, must be a valid CSS min-height. Ex: 80vh, 30%, 50px
`mapTypeId(string)` (default: roadmap) accepts a string: roadmap,satellite,hybrid, terrain
`searchBoxPlaceholderText(string)` (default: Search Address) accepts a string to customize de search box placeholder text
`locationButtonText(string)` (default: My location) accepts a string to customize de location button text
`fixMarkerOnCenter(bool)` (default: false) when the user drags the map the marker pans to the center and updates the field value
`default(array)` (default: ['lat' => 0,'lng' => 0]) sets the default value
`defaultToMyLocation(bool)` (default: false) sets the default value to the current location

### On your filament form schema
```php
        LocationPicker::make('location')
            ->default(['lat' => 40.7587,'lng' => -73.9786])
            ->zoom(15)
            ->zoomControl()
            ->minHeight('60vh')
            ->mapTypeId('satellite')
            ->mapTypeControl()
            ->scaleControl()
            ->streetViewControl()
            ->fullScreenControl()
            ->rotateControl()
            ->searchBoxControl()
            ->searchBoxPlaceholderText('Type an address')
            ->geolocationControl()
            ->locationButtonText('Go to my location')
            ->defaultToMyLocation()
            ->coordsBoxControl()
            ->fixMarkerOnCenter()
```
This will display a map with all the available options

![Example 2](https://github.com/EmilioBravo/filament-google-maps-picker/blob/master/resources/readme/example2.jpg?raw=true)


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Luis Escobar Bravo](https://github.com/EmilioBravo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
