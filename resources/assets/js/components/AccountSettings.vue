<template>
    <div class="row">
        <form class="form" role="form" name="form" id="form">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="New Password" v-model="accountuser.password">
                </div>

                <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirm" placeholder="Confirm New Password" v-model="accountuser.password_confirmation">
                </div>
            </div>

            <div class="col-md-12">
                <button class="btn btn-primary" @click.prevent="saveChanges">Change Password</button>
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
                accountuser: {
                    password: '',
                    password_confirmation: ''
                }
            }
        },

        ready() {

        },

        methods: {
            saveChanges() {
                this.$http.post('/api/profile/password', this.accountuser).then((response) => {
                    toastr.success('Your password was successfully updated', '', {timeOut: 3000});
                }).catch((response) => {
                    toastr.error('Something went wrong', '', {timeOut: 3000});
                });
            }
        }
    }
</script>

<style>

</style>