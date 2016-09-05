<template>
    <div class="row">
        {{ meetups | json }}
        <div class="col-md-6 col-sm-12" v-for="meetup in meetups">

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
