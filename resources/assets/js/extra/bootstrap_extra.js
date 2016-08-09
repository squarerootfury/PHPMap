// Including Map related Libraries
window.places = require('places.js');

// Including Site related Libraries
window.instantsearch = require('instantsearch.js');
window.autocomplete = require('autocomplete.js');

window.moment = require('moment');

Vue.filter('date', function (value) {
    return moment(value).format("dddd, MMMM Do YYYY, h:mm:ss a")
})
