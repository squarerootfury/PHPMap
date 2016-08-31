<template>
    <div id="map"></div>
</template>

<script>
    var geomap;
    var MarkerClusterer = require('marker-clusterer-plus');
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
                    var positions = [];
                    var markers = [];

                    all.forEach(function (user) {
                        var usr = {
                            name: user.name,
                            username: user.username,
                            avatar: user.avatar,
                            geo: {
                                lat: parseFloat(user.lat),
                                lon: parseFloat(user.lng)
                            }
                        };

                        // Make sure that we don't have two users at the exact same position
                        var position;
                        var randomness = 0.01;
                        while(true && usr.geo.lat > 0 && usr.geo.lon > 0) {
                            position = usr.geo.lat + "-" + usr.geo.lng;
                            if(positions.indexOf(position) !== -1) {
                                usr.geo.lat += (Math.random() - 0.5) * randomness;
                                usr.geo.lon += (Math.random() - 0.5) * randomness;
                            } else {
                                break;
                            }
                        }
                        positions.push(position);
                        
                        var html = '<span><img style="max-height: 15px;" class="img img-circle" src="' + usr.avatar + '" alt="">&nbsp;<a href="/@'+ usr.username +'">' + usr.username + '</a></span>';
                        var userLatLng = new google.maps.LatLng(usr.geo.lat, usr.geo.lon);

                        var marker = new google.maps.Marker({
                            position: userLatLng
                        });
                        
                        markers.push(marker);

                        var infowindow = new google.maps.InfoWindow({
                            content: html
                        });

                        google.maps.event.addListener(marker, 'click', function (evt) {
                            infowindow.open(map, marker);
                        });
                    });

                    var clustererOptions = {
                        imagePath: '/images/map/m'
                    };
    
                    new MarkerClusterer(map, markers, clustererOptions);
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

    #map .cluster {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Chrome/Safari/Opera */
        -khtml-user-select: none; /* Konqueror */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none;
    }
</style>
