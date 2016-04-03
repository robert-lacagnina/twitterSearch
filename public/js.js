$(document).ready(function () {

    var searchQuery = $('twitter-search').val();

    $.post('/search/' + searchQuery);
});