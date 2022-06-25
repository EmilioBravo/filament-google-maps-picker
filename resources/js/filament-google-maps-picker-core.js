function googleMapPicker(config) {

    return {

        value: config.value,
        zoom: config.zoom,

        init: function () {

            var center = {
                lat: this.value.lat || 0,
                lng: this.value.lng || 0
            }

            var map = new google.maps.Map(this.$refs.map, {
                center: center,
                zoom: config.options.zoom,
                mapTypeId: config.options.mapTypeId,
                ...config.controls
            })

            var marker = new google.maps.Marker({
                position: center,
                map
            })

            map.addListener('click', (event) => {
                this.value = event.latLng.toJSON();
            });


            if (config.options.fixMarkerOnCenter) {
                map.addListener('drag', (event) => {
                    marker.setPosition(map.getCenter());
                });

                map.addListener('dragend', (event) => {
                    marker.setPosition(map.getCenter());
                    this.value = map.getCenter().toJSON();
                });
            }

            if (config.controls.geolocationControl) {
                const locationButton = this.$refs.locationButton;
                map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(locationButton);

                locationButton.addEventListener("click", () => {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };
                                this.value = pos;
                            },
                            () => {
                                console.log('Browser supports Geolocation but got error. Probably no permission granted.');
                            }
                        );
                    } else {
                        console.log('Browser doesn\'t support Geolocation');
                    }
                });
            }

            console.log(config.options);
            console.log(center);
            if (config.options.defaultToMyLocation && center.lat===0 && center.lng===0) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };
                            this.value = pos;
                        },
                        () => {
                            console.log('Browser supports Geolocation but got error. Probably no permission granted.');
                        }
                    );
                } else {
                    console.log('Browser doesn\'t support Geolocation');
                }
            }

            if (config.controls.searchBoxControl) {
                const input = this.$refs.searchBox;
                const searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
                searchBox.addListener("places_changed", () => {
                    input.value = ''
                    this.value = searchBox.getPlaces()[0].geometry.location
                })
            }

            if (config.controls.coordsBoxControl) {
                coordsBoxControl = this.$refs.coordsBox;
                map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(coordsBoxControl);
            }

            this.$watch('value', () => {
                let position = this.value;
                marker.setPosition(position);
                map.panTo(position);


                if (config.controls.coordsBoxControl) {
                    coordsBoxControl.value = position.lat + ',' + position.lng;
                }
            })

        }

    }
}
