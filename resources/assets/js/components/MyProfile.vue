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
                                <i class="fa fa-home" aria-hidden="true"></i> &nbsp; {{ singleuser.address }}
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

            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#posts" data-toggle="tab" aria-expanded="true" v-if="userposts">Posts</a></li>
                    <li class=""><a href="#articles" data-toggle="tab" aria-expanded="false">Articles</a></li>
                    <li class=""><a href="#meetups" data-toggle="tab" aria-expanded="false">Meetups</a></li>
                </ul>

                <br>

                <div id="tabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="posts">
                        <div class="panel panel-default">
                            <form role="form" class="form">
                                <div class="form-group">
                                    <div class="panel-body">
                                        <input type="text" class="form-control" placeholder="What´s on your mind..?" v-model="post.body">
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm pull-right" @click.prevent="createPost">
                                            Publish
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="panel panel-default" v-for="post in userposts">
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="media-heading"><small class="pull-left">{{ post.created_at | date }}</small> <small class="pull-right"><a href="#" @click.prevent="deletePost(post.id)">
                                            <!--<i class="fa fa-times" aria-hidden="true"></i>-->x
                                        </a></small></p>
                                        <br>
                                        <p v-html="post.body | marked"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="articles">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                    </div>
                    <div class="tab-pane fade" id="meetups">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
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
                singleuser: [],
                userposts: [],
                intro: [],
                post: {
                    body: ''
                }
            }
        },

        filters: {
            marked: marked
        },

        ready() {
            this.getUser();
            this.getPosts();
            this.createEditor();
        },

        methods: {
            getUser() {
                this.singleuser = this.user;
                this.intro = this.singleuser.intro;
            },

            getPosts() {
                this.$http.get('/api/profile/posts').then((response) => {
                    this.userposts = response.json();
                });
            },

            saveInfo() {
                this.$http.post('/api/profile/info', this.intro).then((response) => {
                    toastr.success('Your info was successfully updated', '', {timeOut: 3000});
                }, (response) => {
                    toastr.error(response.data, 'Something went wrong', {timeOut: 3000});
                });
            },

            createEditor() {
                $(document).ready(function() {
//                    $('#summernote').summernote({
//                        airMode: true,
//                    });

                    $('#summernote').summernote({
                        height: 300,
                        minHeight: null,
                        maxHeight: null,
                        focus: true,
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']]
                        ]
                    });
                });
            },

            createPost() {
                this.$http.post('/api/profile/posts', this.post).then((response) => {
                        this.post = '';
                        this.getPosts();
                    }, (response) => {
                    toastr.error('Something went wrong', '', {timeOut: 3000});
                });
            },

            deletePost(id) {
                this.$http.delete('/api/profile/posts/'+ id).then((response) => {
                        toastr.success('Your post was successfully deleted', '', {timeOut: 3000});
                        this.getPosts();
                    }, (response) => {
                        toastr.error('Something went wrong', '', {timeOut: 3000});
                });
            },
        }
    }
</script>

<style>

</style>