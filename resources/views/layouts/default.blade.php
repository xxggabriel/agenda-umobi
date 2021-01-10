<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,300,300italic,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title') Umobi</title>
</head>
<body>
    
    <header>
        <div class="container">
            <div class="header-logo">
                <a href="/">
                    <img src="/svg/logo.svg" alt="">
                </a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>


    <footer>
        Gabriel Oliveira De Souza 
    </footer>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    @yield('scripts')
</body>
</html>