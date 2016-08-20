<template>
    <div class="row">
        <form class="form" role="form" name="form" id="form">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Your Name" v-model="settingsuser.name">
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" v-model="settingsuser.email">
                </div>

                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" placeholder="Your Company" v-model="settingsuser.company">
                </div>

                <div class="form-group">
                    <label for="intro">Personal Intro</label>
                    <textarea type="text" class="form-control" cols="10" id="intro" placeholder="Your personal intro" v-model="settingsuser.intro"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" id="website" placeholder="Your Website/Blog" v-model="settingsuser.website">
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" placeholder="https://twitter.com/username" v-model="settingsuser.twitter_url">
                </div>

                <div class="form-group">
                    <label for="github">GitHub</label>
                    <input type="text" class="form-control" id="github" placeholder="https://github.com/username" v-model="settingsuser.github_url">
                </div>

                <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" class="form-control" id="linkedin" placeholder="https://linkedin.com/username" v-model="settingsuser.linkedin_url">
                </div>
            </div>

            <div class="col-md-12">
                <hr>
                <button type="submit" class="btn btn-primary" @click.prevent="saveChanges">Save Changes</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'user'
        ],

        data(){
            return{
                settingsuser: []
            }
        },

        ready() {
            this.fetchUser();
        },

        methods: {
            fetchUser() {
                this.$http.get('/api/users/' + this.user.id).then((response) => {
                    this.settingsuser = response.json();
                });
            },

            saveChanges() {
                this.$http.patch('/api/users/' + this.user.id, this.settingsuser).then((response) => {
                    toastr.success('Your profile was successfully updated', '', {timeOut: 3000});
                }).catch((response) => {
                    toastr.error('Something went wrong', '', {timeOut: 3000});
                });
            }
        }
    }
</script>

<style>

</style>