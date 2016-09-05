<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6" v-for="postcard in postcards">
                <article>
                    <h4>{{ postcard.username }} <small>{{ postcard.city }} in {{ postcard.country }}</small></h4>
                    <img class="img img-responsive" v-bind:src="postcard.path">
                </article>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'user'
        ],

        data() {
            return {
                postcards: [],
            }
        },

        filters: {
            marked: marked
        },

        ready() {
            this.getPostcards();
        },

        methods: {
            getPostcards() {
                this.$http.get('/public/postcards').then((response) => {
                    this.postcards = response.json();
                })
            }
        }
    }
</script>

<style>
    code {
        color: #f66;
    }
</style>