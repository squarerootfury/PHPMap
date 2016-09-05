
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Including other Libraries
require('./extra/bootstrap_extra');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
Vue.component('homemap', require('./components/HomeMap.vue'));
Vue.component('latest-posts', require('./components/LatestPosts.vue'));
Vue.component('users', require('./components/Users.vue'));
Vue.component('singleuser', require('./components/SingleUser.vue'));
Vue.component('myprofile', require('./components/MyProfile.vue'));
Vue.component('createarticle', require('./components/CreateArticle.vue'));
Vue.component('profilesettings', require('./components/ProfileSettings.vue'));
Vue.component('accountsettings', require('./components/AccountSettings.vue'));
Vue.component('articles', require('./components/Articles.vue'));
Vue.component('postcards', require('./components/Postcards.vue'));
Vue.component('usergroups', require('./components/Usergroups.vue'));

// Passport Components
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

const app = new Vue({
    el: '#app'
});

