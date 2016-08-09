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
window.Pusher = require('pusher-js');

window.swal = require('sweetalert');
window.marked = require('marked');

Vue.filter('date', function (value) {
    return moment(value).format("dddd, MMMM Do YYYY, h:mm:ss a")
})
