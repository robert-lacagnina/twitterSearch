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

                var formattedDate = new Date(tweet.createdTimeStamp * 1000);

                $('.search-results-tbody').append(
                    '<tr class="result-row"><td>' + tweet.handle +  '</td>' +
                    '<td>' + formattedDate + '</td>'
                    + '<td>' + tweet.tweetText + '</td></tr>');
            });
        });
    });
});