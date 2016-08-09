<template>
    <div class="by amt">
        <div class="gc">
            <div class="gn">
                <div class="qv rc aog alu">
                    <div class="qx" style="background-image: url({{ singleuser.profile_cover }})"></div>
                    <div class="qw dj">
                        <img class="aoh" v-bind:src="singleuser.avatar">

                        <h5 class="qy">
                            <p class="aku">{{ singleuser.name }} <br> <small>@{{ singleuser.username }}</small></p>
                        </h5>

                        <p class="alu">{{ singleuser.intro }}</p>
                        <ul class="aoi">
                            <li class="aoj">
                                <a href="#" class="aku" data-toggle="modal">
                                    Followers
                                    <h5 class="ali">12M</h5>
                                </a>
                            </li>

                            <li class="aoj">
                                <a href="#" class="aku" data-toggle="modal">
                                    Enemies
                                    <h5 class="ali">1</h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="qv rc sm sp">
                    <div class="qw">
                        <h5 class="ald">About</h5>
                        <ul class="eb tb">
                            <li v-if="singleuser.company">
                                <i class="fa fa-briefcase" aria-hidden="true"></i> &nbsp; {{ singleuser.company }}
                            </li>

                            <li v-if="singleuser.city">
                                <i class="fa fa-home" aria-hidden="true"></i> &nbsp; <span v-if="singleuser.city">{{ singleuser.city }}</span><span v-if="singleuser.country">, {{ singleuser.country }}</span>
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
                <ul class="ca qo anx">

                    <li class="qf b aml">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="What´s on your mind..?" v-model="post.body">
                            <div class="fj">
                                <button type="button" class="cg fm" @click.prevent="createPost">
                                    Publish
                                </button>
                            </div>
                        </div>
                    </li>

                    <li class="qf b aml" v-for="post in userposts">
                        <a class="qj" href="/@{{ singleuser.username }}">
                            <img class="qh cu" v-bind:src="singleuser.avatar" alt="{{ singleuser.username }}">
                        </a>
                        <div class="qg">
                            <div class="qn">
                                <small class="eg dp">{{ post.created_at | date }} | <a href="#" @click.prevent="deletePost(post.id)"><i class="fa fa-times" aria-hidden="true"></i></a></small>
                                <h5>{{ singleuser.username }}</h5>
                            </div>

                            <p v-html="post.body | marked"></p>
                        </div>
                    </li>

                </ul>
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
        },

        methods: {
            getUser() {
                this.singleuser = this.user;
            },

            getPosts() {
                this.$http.get('/intern/profile/posts').then((response) => {
                    this.userposts = response.json();
                });
            },

            createPost() {
                this.$http.post('/intern/profile/posts', this.post).then((response) => {
                    this.post = '';
                    this.getPosts();
                }, (response) => {
                    swal("Ooops!", "Something went wrong", "error");
                });
            },

            deletePost(id) {
                this.$http.delete('/intern/profile/posts/'+ id).then((response) => {
                    this.getPosts();
                this.getPosts();
            }, (response) => {
                    swal("Ooops!", "Something went wrong", "error");
                });
            }
        }
    }
</script>

<style>

</style>