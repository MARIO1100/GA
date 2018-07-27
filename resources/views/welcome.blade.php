<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GolpeAvisa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet" type="text/css">    
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar">
            <a class="navbar-brand">Golpe Avisa</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Graphs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Control Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Maps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Socket <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
        <script src="/js/app.js" type="text/javascript"></script>
    </body>
</html>
