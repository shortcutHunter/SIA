<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    @yield('name')
    @yield('css')
</head>
<body class="theme-red">
    @include('partials.loader')
    @include('partials.topNavbar')
    @include('partials.leftNavbar')


    <section id="mainContent">
        @yield('main-content')
    </section>


    @yield('js')
</body>
</html>