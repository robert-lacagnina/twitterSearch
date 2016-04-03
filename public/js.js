$(document).ready(function () {
    $('#submit-tweet-search').click(function () {

        var $twitterSearch = $('#twitter-search');
        var searchQuery = $twitterSearch.val();

        console.log(searchQuery);

        $.get('/search?q=' + encodeURIComponent(searchQuery), function (data) {

            //remove all result rows from the table
            $('tr.result-row').remove();

            //clear searchbox
            $twitterSearch.val('');

            data.tweets.forEach(function (tweet) {
                $('.search-results-tbody').append(
                    '<tr class="result-row"><td>' + tweet.handle +  '</td>' +
                    '<td>' + tweet.createTimeStamp + '</td>'
                    + '<td>' + tweet.tweetText + '</td></tr>');
            });
        });
    });
});