<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Bubo Patika</title>
    <link rel="shortcut icon" href="{{asset('favicon.svg')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    <!----- Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen text-black " style="background-color: #283D3B">

    <!-- Header -->
    <header class="relative flex items-center shadow-md p-4">
        <!-- Logo link -->
        <a href="/">
            <img src="{{asset('bubo-logo.webp')}}" width="150px" height="85px" alt="logo" 
            class="mr-4 rounded-full hover:scale-105 transition-all w-20 h-auto sm:w-16 md:w-20 lg:w-28 xl:w-36">
        </a>

        <!-- Navbar-->
        <x-nav/>
    </header>

    <!-- Main content -->
    <main class="flex-grow">
        @yield('content')
        <div class="flex flex-grow text-white items-center justify-center flex-col">
           
        </div>
    </main>

    <!-- Footer -->
    <x-footer/>
</body>
</html>