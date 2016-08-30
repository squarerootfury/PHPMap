<template>
    <div id="map"></div>
</template>

<script>
    var geomap;
    export default {
        data() {
            return {
                users: []
            };
        },

        ready() {
            this.mapInit();
        },

        methods: {
            mapInit() {
                var properties = this.loadMapProperties();

                var mapOptions = {
                    zoom: properties.zoom,
                    center: new google.maps.LatLng(properties.lat, properties.lng),
                    scrollwheel: false
                };

                geomap = new google.maps.Map(document.querySelector('#map'), mapOptions);
                this.createMap(geomap,'initialized');

                google.maps.event.addListener(geomap, 'dragend', () => {
                    this.storeMapProperties();
                });

                google.maps.event.addListener(geomap, 'zoom_changed', () => {
                    this.storeMapProperties();
                });
            },

            createMap(map, options) {
                this.$http.get('/public/users').then(response => {
                    this.users = response.json();

                    var all = this.users;

                    all.forEach(function (user) {
                        var usr = {
                            name: user.name,
                            username: user.username,
                            avatar: user.avatar,
                            geo: {
                                lat: user.lat,
                                lon: user.lng
                            }
                        };

                        var html = '<span><img style="max-height: 15px;" class="img img-circle" src="' + usr.avatar + '" alt="">&nbsp;<a href="/@'+ usr.username +'">' + usr.username + '</a></span>';
                        var userLatLng = new google.maps.LatLng(usr.geo.lat, usr.geo.lon);

                        var marker = new google.maps.Marker({
                            position: userLatLng,
                            map: map,
                        });

                        var infowindow = new google.maps.InfoWindow({
                            content: html
                        });

                        google.maps.event.addListener(marker, 'click', function (evt) {
                            infowindow.open(map, marker);
                        });
                    });
                });
            },

            loadMapProperties() {
                var properties = JSON.parse(localStorage.getItem('HomeMap.properties'));
                return properties ? properties : { lat: 51.165691, lng: 10.451526, zoom: 3 };
            },

            storeMapProperties() {
                localStorage.setItem('HomeMap.properties', JSON.stringify({
                    lat: geomap.getCenter().lat(),
                    lng: geomap.getCenter().lng(),
                    zoom: geomap.getZoom()
                }));
            }
        }
    }
</script>

<style>
    #map {
        width: 100%;
        height: 600px;
        position: relative;
        left: 0;
        top: -22px;
    }
</style>
