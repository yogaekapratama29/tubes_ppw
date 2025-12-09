<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>@yield('style')</style>
  </head>
  <body>
    @yield('content')
    <script>@yield('script')</script>
  </body>
</html>