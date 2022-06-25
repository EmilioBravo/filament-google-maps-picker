<script src="https://maps.googleapis.com/maps/api/js?key={{config('filament-google-maps-picker.google_maps_key')}}&libraries=places&v=weekly&language={{app()->getLocale()}}"></script>

<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    >

    <div wire:ignore x-data="googleMapPicker({
        value: $wire.entangle('{{ $getStatePath() }}'),
        controls:{{$getMapControls()}},
        options:{{$getMapOptions()}}
        })">
    @if($isGeolocationControlEnabled())
        <button x-ref="locationButton" onclick="return false;" class="mb-6 inline-flex items-center justify-center gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button h-9 px-4 text-sm text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600 filament-page-button-action">
            <x-heroicon-o-location-marker class="w-3 h-3" />
            <span>{{$getLocationButtonText()}}</span>
        </button>
    @endif
    @if($isSearchBoxControlEnabled())
        <input x-ref="searchBox" type="text" placeholder="{{$getSearchBoxPlaceholderText()}}" onkeydown="if (event.keyCode == 13){  return false;}" class="mt-2 ml-2 w-2/6 block transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300" />
    @endif
    @if($isCoordsBoxControlEnabled())
        <input x-ref="coordsBox" type="text" class="w-2/6 ml-2 block transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300" />
    @endif
        <div x-ref="map" class="w-full" style="min-height: {{$getMinHeight()}} "></div>
    </div>
</x-forms::field-wrapper>