<!DOCTYPE html>
<html>
    <head>
        <title>Twitter Search</title>

        <link href="style.css" rel="stylesheet">
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="container z-depth-2">

            <nav>
                <div class=" blue lighten-1  nav-wrapper">
                    <h4 id="heading" class="center-align">Twitter Search</h4>
                </div>
            </nav>

            <div class="row search-main">
                <form class="col s6 offset-m1">
                    <div class="row">
                        <div class="input-field">
                            <label for="twitter-search">Search Twitter...</label>
                            <input id="twitter-search" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col offset-s10"><a id="submit-tweet-search" class="blue waves-effect waves-light btn">Go!</a></div>
                    </div>
                </form>
            </div>

            <div class="container">
                <table class="results-table responsive-table">
                    <thead>
                    <tr>
                        <th data-field="id">Handle</th>
                        <th data-field="name">Date Posted</th>
                        <th data-field="price">Tweet</th>
                    </tr>
                    </thead>

                    <tbody class="search-results-tbody">
                    </tbody>
                </table>
            </div>

        </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

        <script src="js.js"></script>
    </body>
</html>
