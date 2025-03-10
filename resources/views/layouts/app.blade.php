<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Vuokraamo')</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url('/image/dark.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="relative flex flex-col min-h-screen">
    @include('inc.header')

    <main class="relative flex-grow container mx-auto py-8 z-10 bg-transparent bg-opacity-60 rounded shadow-lg">
        @yield('content')
    </main>

    <script>
            document.addEventListener('DOMContentLoaded', () => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = 'opacity 0.5s ease-out';
                    successMessage.style.opacity = '0';
                    setTimeout(() => successMessage.remove(), 500);
                }, 1500);
            }
        });
    </script>
</body>
</html>
