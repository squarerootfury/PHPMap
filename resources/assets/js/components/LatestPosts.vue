<template>
    <div class="post-list row">
        <div class="col-md-6 col-sm-12" v-for="post in posts">
            <a href="/@{{ post.author.username }}">
                <div class="post panel panel--with-avatar panel-default">
                    <div class="post-avatar"><img alt="" v-bind:src="post.author.avatar" alt="{{ post.author.username }}"></div>
                    <div class="panel-heading">{{ post.author.username }}</div>
                    <div class="panel-body">
                        {{ post.body }}
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            };
        },

        ready() {
            this.loadPosts();
        },

        methods: {
            loadPosts() {
                this.$http.get('/public/posts/latest').then(response => {
                    this.posts = response.json();
                });
            }
        }
    }
</script>

<style>
    .panel .post-avatar {
        position: absolute;
        left: -45px;
        top: -22px;
        border-radius: 100px;
        overflow: hidden;
        border: 3px solid #7BD1F1;
    }

    .panel.panel--with-avatar .panel-heading, .panel.panel--with-avatar .panel-body {
        padding-left: 50px;
    }

    .post {
        margin-right: 40px;
        margin-top: 30px;
        position: relative;
        transition: box-shadow 0.15s ease-in;
    }
    
    a .post, a:hover .post {
        text-decoration: none;
        color: #666666;
    }

    .post:hover {
        box-shadow: 0 1px 20px rgba(0, 0, 0, 0.3);
    }
</style>
