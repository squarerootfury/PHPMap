<template>
    <div class="row">
        <div class="col-md-4" v-for="ug in ugs.groups">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ ug.name }}</h3>
                </div>

                <img class="img img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?maptype=roadmap&center={{ ug.latitude }},{{ ug.longitude }}&zoom=13&size=400x200&key=AIzaSyDlDS7KYdMMQd_CynknFWTxhZwUwMhnZAg">

                <div class="panel-footer">
                    <i class="fa fa-link" aria-hidden="true"></i> <a href="{{ ug.url }}">Visit website</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ugs: []
            }
        },

        ready() {
            this.getUsergroups();
        },

//        filters: {
//            marked: marked,
//
//            truncate: function(string, value) {
//                return string.substring(0, value) + '...';
//            }
//        },

        methods: {
            getUsergroups() {
                this.$http.get('/public/usergroups').then(response => {
                    this.ugs = response.json();
                });
            }
        }
    }
</script>

<style>

</style>
