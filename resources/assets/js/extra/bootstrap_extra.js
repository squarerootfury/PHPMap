// Including Map related Libraries
window.places = require('places.js');

// Including Site related Libraries
window.algoliasearch = require('algoliasearch');
window.instantsearch = require('instantsearch.js');
window.autocomplete = require('autocomplete.js');
window.algoliasearchHelper = require('algoliasearch-helper');

window.textcomplete = require('jquery-textcomplete');

window.moment = require('moment');
window.selectize = require('selectize');

window.swal = require('sweetalert');
window.marked = require('marked');
window.toastr = require('toastr');

// import Echo from "laravel-echo"
//
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '4dc9a34c3ba97f1d923c',
//     encrypted: true
// });

window.toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

// Including Realtime related Libraries
window.Pusher = require('pusher-js');
window.Echo = require('laravel-echo');

Vue.filter('date', function (value) {
    return moment(value).format("dddd, MMMM Do YYYY, h:mm:ss a")
})
