<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="css/style.css"/>

        <title>@yield('tittle')</title>
       
    </head>
    <header>
    <ul>
    <li><a href="/"> Principal</a> </li>
    <li><a href="/create"> Registrar</a> </li>
    <li><a href="/login"> Logar</a> </li>
    </ul>
    </header>
    <body>
    @yield('content')
        
    </body>
</html>
