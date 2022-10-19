<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shared Shopping</title>

        <!-- Fonts -->
        
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
        
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="site-header">
            <div class="header-inner">
                <a class="site-title" href="{{ route('index') }}">
                    <h1>Shared Shopping</h1>
                </a>
            </div>
        </div>
        <div class="site-body">
            <div class="body-container">
                @yield('content')
            </div>
        </div>
        <div class="legal">
            &copy; Daniel Evans {{ now()->year }}
        </div>
    </body>
</html>
