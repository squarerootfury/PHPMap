<template>
    <div class="container">
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

                <div class="gz">
                    <ul class="ca qo anx" v-if="userposts.length > 0">
                        <li class="qf b aml" v-for="post in userposts">
                            <a class="qj" href="/@{{ singleuser.username }}">
                                <img class="qh cu" v-bind:src="singleuser.avatar" alt="{{ singleuser.username }}">
                            </a>
                            <div class="qg">
                                <div class="qn">
                                    <small class="eg dp">{{ post.created_at | date }}</small>
                                    <h5>{{ singleuser.username }}</h5>
                                </div>

                                <p v-html="post.body | marked"></p>
                            </div>
                        </li>

                    </ul>

                    <ul class="ca qo anx text-center" v-else>
                        <div class="panel panel-default">
                            <h4>No posts</h4>
                        </div>
                    </ul>
                </div>

                <div class="gn">
                    <div class="qv rc alu ss">
                        <div class="qw">
                            <h5 class="ald">Other Users <small>· <a href="/users">View All</a></small></h5>
                            <ul class="qo anx">
                                <li class="qf" v-for="user in relatedusers">
                                    <a class="qj" href="/@{{ user.username }}">
                                        <img class="qh cu" v-bind:src="user.avatar">
                                    </a>
                                    <div class="qg">
                                        <strong>{{ user.name }}</strong> <br>
                                        @{{ user.username }}
                                        <div class="aoa">
                                            <button class="cg ts fx">
                                                <span class="h vc"></span> Follow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="qz">
                            {{ singleuser.username }} really likes these nerds, no one knows why though.
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
                relatedusers: []
            }
        },

        filters: {
            marked: marked
        },

        ready() {
            this.getUser();
            this.getPosts();
            this.getUsers();
        },

        methods: {
            getUser() {
                this.singleuser = this.user;
            },

            getPosts() {
                this.$http.get('/intern/users/getPosts/'+ this.singleuser.id).then((response) => {
                    this.userposts = response.json();
                });
            },

            getUsers() {
                this.relatedusers = this.users;
            },

            followUser() {
                this.$http.post('/intern/users/followers', this.post).then((response) => {

                    }, (response) => {
                    swal("Ooops!", "Something went wrong", "error");
                });
            },
        }
    }
</script>

<style>

</style>