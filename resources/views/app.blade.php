<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Bubo Patika</title>
    <link rel="shortcut icon" href="{{asset('favicon.svg')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen text-black bg-[#283D3B]" >

    <!-- Header -->
    <header class="relative justify-center flex items-center shadow-md p-4">
        <a href="/">
            <img src="{{asset('bubo-logo.webp')}}" width="150px" height="85px" alt="logo" 
                 class="mr-4 rounded-full hover:scale-105 transition-all w-20 h-auto sm:w-16 md:w-20 lg:w-28 xl:w-36">
        </a>

    </header>

    <!-- Landing content -->
    <main class="flex-grow flex flex-col items-center justify-center text-center py-20 px-4">
        <h1 class="text-5xl font-bold font-jakarta text-white mb-6">Üdvözöllek a Dr. Bubo Patikában!</h1>
        <p class="text-xl text-white mb-8 font-jakarta">Fedezd fel termékeinket és szolgáltatásainkat.</p>
        <div class="flex flex-row gap-6">
        <a href="{{ route('layout') }}" class="bg-white text-green-800 font-semibold px-6 py-3 rounded-lg shadow hover:bg-slate-200 hover:text-green-900 transition">
            Folytatás Vendégként
        </a>
        <!-- Ha már be vagyunk lépve akkor a layoutra visz át -->
        <a href="{{ auth()->check() ? route('layout') : route('login') }}" class="bg-white text-green-800 font-semibold px-6 py-3 rounded-lg shadow hover:bg-slate-200 hover:text-green-900 transition">
            Folytatás Adminként
        </a>
         </div>
    </main>

    <!-- Footer -->
    <x-footer/>
</body>
</html>