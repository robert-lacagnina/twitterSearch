$(document).ready(function () {
    $('#submit-tweet-search').click(function () {

        console.log(this);
        console.log('clicked!');

        var $twitterSearch = $('#twitter-search');
        var searchQuery = $twitterSearch.val();

        console.log(searchQuery);

        $.get('/search/' + searchQuery, function (data) {

            //remove all rows from the table
            $('tr').remove();

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
});