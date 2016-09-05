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
                this.$http.get('https://php.ug/api/rest/listtype/1').then(response => {
                    this.meetups = response.data;
                });
            }
        }
    }
</script>

<style>

</style>
