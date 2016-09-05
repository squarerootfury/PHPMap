<template>
    <div class="post-list row">
        <div class="col-md-6 col-sm-12" v-for="post in posts">
            <a href="/@{{ post.author.username }}" class="post panel panel--with-avatar panel-default">
                <div class="post-avatar"><img class="img img-responsive" v-bind:src="post.author.avatar" alt="{{ post.author.username }}"></div>
                <div class="panel-heading"><strong>{{ post.author.username }}</strong></div>
                <div class="panel-body" v-html="post.body | marked | truncate '60'"></div>
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

        filters: {
            marked: marked,

            truncate: function(string, value) {
                return string.substring(0, value) + '...';
            }
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
        border: 3px solid #4CAF50;
        width: 80px;
        height: 80px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    }
    
    .post-avatar img {
        max-width: 100%;
    }

    .panel.panel--with-avatar .panel-heading, .panel.panel--with-avatar .panel-body {
        padding-left: 50px;
    }

    .post {
        margin-right: 20px;
        margin-left: 20px;
        margin-top: 30px;
        position: relative;
        transition: box-shadow 0.15s ease-in;
        display: block;
        color: #666666;
    }
    
    a:hover, a:focus {
        text-decoration: none;
        color: #666666;
    }

    .post:hover, .post:focus {
        box-shadow: 0 1px 20px rgba(0, 0, 0, 0.3);
    }

    @media screen and (max-width: 991px) {
        .post {
            margin-right: 0;
            margin-left: 40px;
        }
    }
</style>
