<template>
    <div class="container-fluid">
        <div id="map"></div>
    </div>
</template>

<script>
    var geomap;
    export default {
        data() {
            return {
                users: [],
            };
        },

        ready() {
            this.mapInit();
            google.maps.event.addDomListener(window, 'load', this.mapInit());
        },

        methods: {
            mapInit() {
                var mapOptions = {
                    zoom: 3,
                    center: new google.maps.LatLng(51.165691, 10.451526),

                };
                geomap = new google.maps.Map(document.querySelector('#map'), mapOptions);
                this.createMap(geomap,'initialized');
            },

            createMap(map, options) {
                this.$http.get('/intern/usr').then(response => {
                    this.users = response.json();

                    var users = this.users;

                    users.forEach(function (user) {
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
            }
        }
    }
</script>

<style>
    #map {
        width: 100%;
        height: 600px;
        position: absolute;
        left:0;
        top:48px;
    }
</style>