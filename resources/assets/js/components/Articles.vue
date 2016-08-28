<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6" v-for="article in articles">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ article.title }}</h4>
                    </div>
                </div>
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
                articles: []
            }
        },

        filters: {
            marked: marked
        },

        ready() {
            this.getArticles();
        },

        methods: {
            getArticles() {
                this.$http.get('/public/articles').then((response) => {
                    this.articles = response.json();
                });
            }
        }
    }
</script>

<style>
    code {
        color: #f66;
    }
</style>