<?php

namespace EmilioBravo\FilamentGoogleMapsPicker;

use Spatie\LaravelPackageTools\Package;
use Filament\PluginServiceProvider;
use EmilioBravo\FilamentGoogleMapsPicker\Commands\FilamentGoogleMapsPickerCommand;

class FilamentGoogleMapsPickerServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-google-maps-picker-styles' => __DIR__ . '/../resources/dist/filament-google-maps-picker.css',
    ];

    protected array $scripts = [
        // 'filament-google-maps-picker-scripts' => __DIR__ . '/../resources/dist/filament-google-maps-picker.js',
    ];

    protected array $beforeCoreScripts = [
        'filament-google-maps-picker-scripts' => __DIR__ . '/../resources/dist/filament-google-maps-picker-core.min.js',
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-google-maps-picker')
            ->hasConfigFile()
            ->hasViews();
    }
}
