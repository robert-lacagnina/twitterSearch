$(document).ready(function () {

    var $twitterSearch = $('twitter-search');
    var searchQuery = $('twitter-search').val();

    $.get('/search/' + searchQuery, function (data) {

        //clear searchbox
        $twitterSearch.val('');

        data.tweets.forEach(function (tweet) {
            $('.search-results-tbody').append(
                '<tr><td>' + tweet.handle +  '</td>' +
                '<td>' + tweet.createTimeStamp + '</td>'
                + '<td>' + tweet.tweetText + '</td></tr>');
        });

        
    });
});