<template>
    <div class="row">
        <div class="col-md-4" v-for="meetup in meetups.groups">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ meetup.name }}</h3>
                </div>

                <img class="img" src="https://maps.googleapis.com/maps/api/staticmap?maptype=roadmap&center={{ meetup.latitude }},{{ meetup.longitude }}&zoom=16&size=640x400&key=AIzaSyDlDS7KYdMMQd_CynknFWTxhZwUwMhnZAg">

                <div class="panel-footer">
                    <a href="{{ meetup.url }}">Visit website</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                meetups: []
            }
        },

        ready() {
            this.getMeetups();
        },

//        filters: {
//            marked: marked,
//
//            truncate: function(string, value) {
//                return string.substring(0, value) + '...';
//            }
//        },

        methods: {
            getMeetups() {
                this.$http.get('/public/meetups').then(response => {
                    this.meetups = response.json();
                });
            }
        }
    }
</script>

<style>

</style>
