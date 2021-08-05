<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebTech</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <link
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
         integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
         crossorigin="anonymous"
          />
         <link
            href="https://fonts.googleapis.com/css?family=Raleway"
            rel="stylesheet"
         />
        <!-- Styles -->
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
      @include('inc.navbar')
       <main>
         @yield('content')
       </main>
    </body>
</html>
