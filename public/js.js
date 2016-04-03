$(document).ready(function () {

    var searchQuery = $('twitter-search').val();

    $.get('/search/' + searchQuery, function (data) {
        //loop and load into table???
        
        data.tweets.forEach(function (tweet) {
            $('.search-results-tbody').append('<tr><td>' + tweet.handle +  '</td>' + '<td>' + tweet.createTimeStamp + '</td>' + '' + tweet.tweetText + '');
        });
        
    });
});