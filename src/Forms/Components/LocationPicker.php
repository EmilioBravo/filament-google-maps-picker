<?php

namespace EmilioBravo\FilamentGoogleMapsPicker\Forms\Components;

use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'filament-google-maps-picker::forms.components.location-picker';

    /**
     * Google Maps controls variables
     * @var array
     */

    private array $controls = [
        'zoomControl' => false,
        'mapTypeControl' => false,
        'scaleControl' => false,
        'streetViewControl' => false,
        'rotateControl' => false,
        'fullScreenControl' => false,
        'searchBoxControl' => false,
        'geolocationControl' => false,
        'coordsBoxControl' => false,
    ];

    /**
     * Google Maps options variables
     * @var array
     */

    private array $options = [
        'zoom' => 1,
        'mapTypeId' => 'roadmap', // roadmap, satellite, hybrid or terrain
        'fixMarkerOnCenter' => false,
        'defaultToMyLocation' => false,
        'searchBoxPlaceholderText' => 'Search address..',
        'locationButtonText' => 'My location',
        'minHeight' => '50vh' // vh, px, %
    ];

    /**
     * Setup function
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->default(['lat' => 0, 'lng' => 0]);
    }

    public function zoom(int $zoom): self
    {
        $this->options['zoom'] = $zoom;
        return $this;
    }

    public function mapTypeId(string $mapTypeId): self
    {
        $this->options['mapTypeId'] = $mapTypeId;
        return $this;
    }

    public function fixMarkerOnCenter($status = true): self
    {
        $this->options['fixMarkerOnCenter'] = $status;
        return $this;
    }
    public function defaultToMyLocation($status = true): self
    {
        $this->options['defaultToMyLocation'] = $status;
        return $this;
    }

    public function getSearchBoxPlaceholderText()
    {
        return $this->options['searchBoxPlaceholderText'];
    }

    public function searchBoxPlaceholderText($text = 'Search Address'): self
    {
        $this->options['searchBoxPlaceholderText'] = $text;
        return $this;
    }

    public function getLocationButtonText()
    {
        return $this->options['locationButtonText'];
    }

    public function locationButtonText($text = 'Current Location'): self
    {
        $this->options['locationButtonText'] = $text;
        return $this;
    }

    public function getMinHeight()
    {
        return $this->options['minHeight'];
    }

    public function minHeight($text = 'Current Location'): self
    {
        $this->options['minHeight'] = $text;
        return $this;
    }

    public function zoomControl($status = true): self
    {
        $this->controls['zoomControl'] = $status;
        return $this;
    }

    public function mapTypeControl($status = true): self
    {
        $this->controls['mapTypeControl'] = $status;
        return $this;
    }

    public function scaleControl($status = true): self
    {
        $this->controls['scaleControl'] = $status;
        return $this;
    }

    public function streetViewControl($status = true): self
    {
        $this->controls['streetViewControl'] = $status;
        return $this;
    }

    public function rotateControl($status = true): self
    {
        $this->controls['rotateControl'] = $status;
        return $this;
    }

    public function fullScreenControl($status = true): self
    {
        $this->controls['fullScreenControl'] = $status;
        return $this;
    }

    public function searchBoxControl($status = true): self
    {
        $this->controls['searchBoxControl'] = $status;
        return $this;
    }

    public function coordsBoxControl($status = true): self
    {
        $this->controls['coordsBoxControl'] = $status;
        return $this;
    }

    public function geolocationControl($status = true): self
    {
        $this->controls['geolocationControl'] = $status;
        return $this;
    }

    public function getMapControls()
    {
        return json_encode($this->controls);
    }

    public function getMapOptions()
    {
        return json_encode($this->options);
    }

    public function isSearchBoxControlEnabled()
    {
        return $this->controls['searchBoxControl'];
    }

    public function isCoordsBoxControlEnabled()
    {
        return $this->controls['coordsBoxControl'];
    }

    public function isGeolocationControlEnabled()
    {
        return $this->controls['geolocationControl'];
    }
}
