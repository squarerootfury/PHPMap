<template>
    <div class="container">
        <input class="form-control" type="text" v-model="article.title" placeholder="# Title">
        <br>

        <div class="row">
            <div class="col-md-6">
                <textarea class="form-control" v-model="article.body" debounce="300" rows="25" placeholder="# Content"></textarea>
            </div>

            <div class="col-md-6">
                <div v-html="article.body | marked"></div>
            </div>

            <div class="col-md-12">
                <hr>
                <button class="btn btn-default">Create Article</button>
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
                articles: [],
                article: {
                    title: '',
                    body: '# Content'
                }
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

            },

            createArticle() {

            },


        }
    }
</script>

<style>
    /*textarea, #editor div {*/
        /*display: inline-block;*/
        /*width: 49%;*/
        /*height: 100%;*/
        /*vertical-align: top;*/
        /*-webkit-box-sizing: border-box;*/
        /*-moz-box-sizing: border-box;*/
        /*box-sizing: border-box;*/
        /*padding: 0 20px;*/
    /*}*/

    /*textarea {*/
        /*width: 50%;*/
        /*border: none;*/
        /*border-right: 1px solid #ccc;*/
        /*resize: none;*/
        /*outline: none;*/
        /*background-color: #f6f6f6;*/
        /*font-size: 14px;*/
        /*font-family: 'Monaco', courier, monospace;*/
        /*padding: 20px;*/
    /*}*/

    code {
        color: #f66;
    }
</style>