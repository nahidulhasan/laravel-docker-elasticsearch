<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://v4-alpha.getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Elastic</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/posts">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        {{ Form::open(['action' => 'PostController@search','class' => "form-inline my-2 my-lg-0",'method' => 'GET']) }}
            <input class="form-control mr-sm-2" name="search" id="search_keyword" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" id="search" type="submit">Search</button>
        {{ Form::close() }}
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div style="height: 100px;">

</div>

<div class="container">
    <!-- Example row of columns -->
    @yield('content')

    <hr>

    <footer>
        <p>&copy; Company 2017</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.2.1.js"
              integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
              crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://v4-alpha.getbootstrap.com/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- <script>
    $(document).ready(function(){

        $("#search_keyword").on('keyup', function(e){
            e.preventDefault();

            var search = $("#search_keyword").val();

            $.ajax({
               type:"GET",
               url:"/search",
               data: { search: search },

               success:function(data){
                  console.log(JSON.parse(data));
               }
            });
        });
    });
</script> -->

</body>
</html>
