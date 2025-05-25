<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Conering</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Style -->
        <link rel="stylesheet" href="../css/app.css">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-white">
        @auth
            <script>
                window.location.href = "/dashboard";
            </script>
        @endauth

        @guest
            <script>
                window.location.href = "./login";
            </script>
        @endguest
    </body>
</html>
