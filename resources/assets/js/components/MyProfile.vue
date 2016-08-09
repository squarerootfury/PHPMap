<template>
    <div class="by amt">
        <div class="gc">
            <div class="gn">
                <div class="qv rc aog alu">
                    <div class="qx" style="background-image: url({{ singleuser.avatar }})"></div>
                    <div class="qw dj">
                        <img class="aoh" v-bind:src="singleuser.avatar">

                        <h5 class="qy">
                            <a class="aku" href="profile/index.html">{{ singleuser.name }}</a>
                        </h5>

                        <p class="alu">I wish i was a little bit taller, wish i was a baller, wish i had a girl…&nbsp;also.</p>

                        <ul class="aoi">
                            <li class="aoj">
                                <a href="#userModal" class="aku" data-toggle="modal">
                                    Friends
                                    <h5 class="ali">12M</h5>
                                </a>
                            </li>

                            <li class="aoj">
                                <a href="#userModal" class="aku" data-toggle="modal">
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
                                <span class="dp h abu all"></span>Worked at <a href="#">{{ singleuser.company }}</a>
                            </li>

                            <li v-if="singleuser.city">
                                <span class="dp h ack all"></span>Lives in <a href="#">{{ singleuser.city }}, {{ singleuser.country }}</a>
                            </li>

                            <li>
                                <span class="dp h adt all"></span>From <a href="#">Seattle, WA</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="gz">
                <ul class="ca qo anx">
                    
                    <li class="qf b aml">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Message">
                            <div class="fj">
                                <button type="button" class="cg fm">
                                    <span class="h xi"></span>
                                </button>
                            </div>
                        </div>
                    </li>

                    <li class="qf b aml">
                        <a class="qj" href="#">
                            <img class="qh cu" v-bind:src="singleuser.avatar" alt="{{ singleuser.username }}">
                        </a>
                        <div class="qg">
                            <div class="qn">
                                <small class="eg dp">4 min</small>
                                <h5>{{ singleuser.username }}</h5>
                            </div>

                            <p>
                                Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="gn">
                <div class="qv rc alu ss">
                    <div class="qw">
                        <h5 class="ald">Sponsored</h5>
                        <div data-grid="images" data-target-height="150"><img class="qh" data-width="640" data-height="640" data-action="zoom" src="https://bootstrap-themes.github.io/application/assets/img/instagram_2.jpg" style="width: 245px; height: 230px; margin-bottom: 10px; margin-right: 0px; display: inline-block; vertical-align: bottom;"></div>
                        <p><strong>It might be time to visit Iceland.</strong> Iceland is so chill, and everything looks cool here. Also, we heard the people are pretty nice. What are you waiting for?</p>
                        <button class="cg ts fx">Buy a ticket</button>
                    </div>
                </div>

                <div class="qv rc alu ss">
                    <div class="qw">
                        <h5 class="ald">Other Users <small>· <a href="/users">View All</a></small></h5>
                        <ul class="qo anx">
                            <li class="qf alm">
                                <a class="qj" href="#">
                                    <img class="qh cu" v-bind:src="singleuser.avatar">
                                </a>
                                <div class="qg">
                                    <strong>Jacob Thornton</strong> @fat
                                    <div class="aoa">
                                        <button class="cg ts fx">
                                            <span class="h vc"></span> Follow
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="qf">
                                <a class="qj" href="#">
                                    <img class="qh cu" v-bind:src="singleuser.avatar">
                                </a>
                                <div class="qg">
                                    <strong>Mark Otto</strong> @mdo
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
                        Dave really likes these nerds, no one knows why though.
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
                singleuser: []
            }
        },

        ready() {
            this.getUser();
        },

        methods: {
            getUser() {
                this.singleuser = this.user;
            }
        }
    }
</script>

<style>

</style>