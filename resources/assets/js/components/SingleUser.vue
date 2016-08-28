<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="card hovercard">
                        <div class="cardheader" style="
                    background: url(https://maps.googleapis.com/maps/api/staticmap?maptype=roadmap&center={{ singleuser.lat }},{{ singleuser.lng }}&zoom=16&size=640x400&key=AIzaSyDlDS7KYdMMQd_CynknFWTxhZwUwMhnZAg);
                    background-size: cover;
                    ; height: 135px;">

                        </div>
                        <div class="avatar">
                            <img alt="" v-bind:src="singleuser.avatar" alt="{{ singleuser.username }}">
                        </div>
                        <div class="info">
                            <div class="title">
                                <p>{{ singleuser.name }}</p>
                            </div>
                            <div class="desc">@{{ singleuser.username }}</div>
                            <div class="desc"></div>
                            <div class="desc"></div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="fa-ul">
                            <li v-if="singleuser.company">
                                <i class="fa fa-briefcase" aria-hidden="true"></i> &nbsp; {{ singleuser.company }}
                            </li>

                            <li v-if="singleuser.city">
                                <i class="fa fa-home" aria-hidden="true"></i> &nbsp; {{ singleuser.country }}
                            </li>

                            <li v-if="singleuser.website">
                                <i class="fa fa-link" aria-hidden="true"></i> &nbsp; <a href="{{ singleuser.website }}">Website</a>
                            </li>

                            <li v-if="singleuser.github_url">
                                <i class="fa fa-github" aria-hidden="true"></i> &nbsp; <a href="{{ singleuser.github_url }}">GitHub</a>
                            </li>

                            <li v-if="singleuser.twitter_url">
                                <i class="fa fa-twitter" aria-hidden="true"></i> &nbsp; <a href="{{ singleuser.twitter_url }}">Twitter</a>
                            </li>

                            <li v-if="singleuser.facebook_url">
                                <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; <a href="{{ singleuser.facebook_url }}">Facebook</a>
                            </li>

                            <li v-if="singleuser.linkedin_url">
                                <i class="fa fa-linkedin" aria-hidden="true"></i> &nbsp; <a href="{{ singleuser.linkedin_url }}">LinkedIn</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#posts" data-toggle="tab" aria-expanded="true" v-if="userposts">Posts</a></li>
                    <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false" v-if="singleuser.intro">Profile</a></li>
                    <!--<li class=""><a href="#articles" data-toggle="tab" aria-expanded="false">Articles</a></li>-->
                    <!--<li class=""><a href="#meetups" data-toggle="tab" aria-expanded="false">Meetups</a></li>-->
                </ul>

                <br>

                <div id="tabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="posts">
                        <div class="panel panel-default" v-for="post in userposts">
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="media-heading"><small class="pull-left">{{ post.created_at | date }}</small></p>
                                        <br>
                                        <p v-html="post.body | marked"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p v-html="singleuser.intro"></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="articles">

                        <div class="panel panel-default" v-for="article in userarticles">
                            <div class="panel-body">
                                <h4>{{ article.title }}</h4>
                                <p>{{ article.excerpt }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="meetups">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media" v-for="user in relatedusers">
                            <div class="media-left">
                                <a href="/@{{ user.username }}">
                                    <img style="max-height: 45px;" class="media-object img img-circle" v-bind:src="user.avatar" alt="{{ user.username }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">{{ user.username }}</h5>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ user.city }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'user', 'users'
        ],

        data() {
            return {
                singleuser: [],
                userposts: [],
                relatedusers: [],
                userarticles: []
            }
        },

        filters: {
            marked: marked,
        },

        ready() {
            this.getUser();
            this.getPosts();
            this.getUsers();
            this.getArticles();
        },

        methods: {
            getUser() {
                this.singleuser = this.user;
            },

            getPosts() {
                this.$http.get('/public/users/getPosts/'+ this.singleuser.id).then((response) => {
                    this.userposts = response.json();
                });
            },

            getArticles() {
                this.$http.get('/public/users/getArticles/'+ this.singleuser.id).then((response) => {
                    this.userarticles = response.json();
            });
            },

            getUsers() {
                this.relatedusers = this.users;
            },

            followUser(id) {
                this.$http.post('/api/users/follow/' + id).then((response) => {
                        toastr.success(response.data, '', {timeOut: 3000});
                    }, (response) => {
                        console.log(response.data);
                        toastr.error(response.data, 'Something went wrong', {timeOut: 3000});
                });
            },
        }
    }
</script>

<style>
    .card {
        padding-top: 20px;
        margin: 10px 0 20px 0;
        background-color: rgba(214, 224, 226, 0.2);
        border-top-width: 0;
        border-bottom-width: 2px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card .card-heading {
        padding: 0 20px;
        margin: 0;
    }

    .card .card-heading.simple {
        font-size: 20px;
        font-weight: 300;
        color: #777;
        border-bottom: 1px solid #e5e5e5;
    }

    .card .card-heading.image img {
        display: inline-block;
        width: 46px;
        height: 46px;
        margin-right: 15px;
        vertical-align: top;
        border: 0;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .card .card-heading.image .card-heading-header {
        display: inline-block;
        vertical-align: top;
    }

    .card .card-heading.image .card-heading-header h3 {
        margin: 0;
        font-size: 14px;
        line-height: 16px;
        color: #262626;
    }

    .card .card-heading.image .card-heading-header span {
        font-size: 12px;
        color: #ffffff;
    }

    .card .card-body {
        padding: 0 20px;
        margin-top: 20px;
    }

    .card .card-media {
        padding: 0 20px;
        margin: 0 -14px;
    }

    .card .card-media img {
        max-width: 100%;
        max-height: 100%;
    }

    .card.people {
        position: relative;
        display: inline-block;
        width: 170px;
        height: 300px;
        padding-top: 0;
        margin-left: 20px;
        overflow: hidden;
        vertical-align: top;
    }

    .card.people:first-child {
        margin-left: 0;
    }

    .card.people .card-top {
        position: absolute;
        top: 0;
        left: 0;
        display: inline-block;
        width: 170px;
        height: 150px;
        background-color: #ffffff;
    }

    .card.people .card-top.green {
        background-color: #53a93f;
    }

    .card.people .card-top.blue {
        background-color: #427fed;
    }

    .card.people .card-info {
        position: absolute;
        top: 150px;
        display: inline-block;
        width: 100%;
        height: 101px;
        overflow: hidden;
        background: #ffffff;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card.people .card-info .title {
        display: block;
        margin: 3px 14px 0 14px;
        overflow: hidden;
        font-size: 16px;
        font-weight: bold;
        line-height: 18px;
        color: #404040;
    }

    .card.people .card-info .desc {
        display: block;
        margin: 3px 14px 0 14px;
        overflow: hidden;
        font-size: 12px;
        line-height: 16px;
        color: #737373;
        text-overflow: ellipsis;
    }

    .card.people .card-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        display: inline-block;
        width: 100%;
        padding: 10px 20px;
        line-height: 29px;
        text-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card.hovercard {
        position: relative;
        padding-top: 0;
        overflow: hidden;
        text-align: center;
        background-color: rgba(214, 224, 226, 0.2);
    }

    .card.hovercard .avatar {
        position: relative;
        top: -50px;
        margin-bottom: -50px;
    }

    .card.hovercard .avatar img {
        width: 100px;
        height: 100px;
        max-width: 100px;
        max-height: 100px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 5px solid rgba(255,255,255,0.5);
    }

    .card.hovercard .info {
        padding: 4px 8px 10px;
    }

    .card.hovercard .info .title {
        margin-bottom: 4px;
        font-size: 24px;
        line-height: 1;
        color: #262626;
        vertical-align: middle;
    }

    .card.hovercard .info .desc {
        overflow: hidden;
        font-size: 12px;
        line-height: 20px;
        color: #737373;
        text-overflow: ellipsis;
    }

    .card.hovercard .bottom {
        padding: 0 20px;
        margin-bottom: 10px;
    }
</style>