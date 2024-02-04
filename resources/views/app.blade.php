<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Red+Hat+Display:wght@400;500;600;700&family=Red+Hat+Text:wght@300;400;500;600;700&display=swap');
        </style>
        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        @vite(['resources/css/app.css'])
        @inertiaHead
    </head>
    <body class="antialiased ">
        @inertia
    </body>
</html>
