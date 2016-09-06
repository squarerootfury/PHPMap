<template>
    <div id="map" :class="{loaded: mapLoaded}"></div>
</template>

<script>
    var geomap;
    var MarkerClusterer = require('marker-clusterer-plus');
    var InfoBox = require('../extra/google_maps_infobox.js');
    
    export default {
        data() {
            return {
                users: [],
                mapLoaded: false
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

                    var infowindow = new google.maps.InfoWindow({
                        content: ""
                    });
                
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
                        
                        var html = '<img class="img img-circle" src="' + usr.avatar + '" alt="">&nbsp;<a href="/@'+ usr.username +'">' + usr.username + '</a>';
                        var userLatLng = new google.maps.LatLng(usr.geo.lat, usr.geo.lon);

                        var marker = new google.maps.Marker({
                            position: userLatLng
                        });
                        
                        markers.push(marker);
                        var infoBox = null;
                        
                        google.maps.event.addListener(marker, 'click', function (evt) {
                            if(infoBox === null) {
                                infoBox = new InfoBox.default({
                                    latlng: this.getPosition(),
                                    map: map,
                                    content: html
                                });
                            } else {
                                infoBox.toggle();
                            }
                        });
                    });

                    var clustererOptions = {
                        imagePath: '/images/map/m'
                    };
    
                    new MarkerClusterer(map, markers, clustererOptions);
                
                    // Map and markers are loaded, show the map
                    this.mapLoaded = true;
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
        opacity: 0;
        width: 100%;
        height: 600px;
        position: relative;
        left: 0;
        top: 0;
        transition: opacity .2s;
    }
    
    #map.loaded {
        opacity: 1;
    }

    #map .cluster {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Chrome/Safari/Opera */
        -khtml-user-select: none; /* Konqueror */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none;
    }

    .infobox {
        position: absolute;
    }
    
    .infobox .content {
        text-align: center;
    }

    .infobox .img {
        width: 100px;
        height: 100px;
        display: block;
        margin: 0 auto;
        border: 3px solid #4CAF50;
        box-shadow: 0 1px 30px rgba(0, 0, 0, 0.3);
    }

    .infobox a {
        display: inline-block;
        margin-top: 5px;
        background: white;
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 14px;
        box-shadow: 0 1px 30px rgba(0, 0, 0, 0.3);
    }
</style>
