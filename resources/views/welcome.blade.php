<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
        @livewireStyles

    </head>
    <body class="antialiased">

   <livewire:comments />

    <livewire:scripts />
    </body>
</html>
