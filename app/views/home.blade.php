<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Presentable</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
           width: 300px;
           height: 300px;
           position: absolute;
           left: 50%;
           top: 50%; 
           margin-left: -150px;
           margin-top: -150px;
        }

        a, a:visited {
            color:#FF5949;
            text-decoration:none;
        }

        a:hover {
            text-decoration:none;
        }

        ul li {
            display:inline;
            margin:0 1.2em;
        }

        p {
            margin:2em 0;
            color:#555;
        }
    </style>
</head>
<body>
    <div class="welcome">
        <a href="{{ \URL::action('PresentationController@index') }}" title="Presentable.">
            <sub><i class="icon-quote-left icon-4x icon-large"></i></sub> <sup><i class="icon-quote-right icon-4x icon-large"></i></sup>
        </a>
        <h1>
            @section('heading')
            Presentable.
            @show
        </h1>
        <h4>
            @section('subheading')
            A presentation tool, written in <a target="_blank" href="http://laravel.com">Laravel</a>.
            @show
        </h4>
    </div>
</body>
</html>
