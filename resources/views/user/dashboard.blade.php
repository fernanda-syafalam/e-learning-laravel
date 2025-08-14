<!-- This is a page for login -->

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
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 flex">
        <div class="w-1/5 h-screen bg-white p-4 justify-between shadow flex flex-col">

    <div class="w-full flex flex-col gap-4">
        <a href="/" class="text-3xl mb-6 font-bold text-blue-400">CONERING</a>
        
        @if (Request::is('dashboard'))
            <a href="/dashboard" class="bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white flex items-center gap-2">
                <i data-feather="home" class="w-5 h-5"></i> Dashboard
            </a>
        @else
            <a href="/dashboard" class="bg-white w-full px-4 py-2 rounded-full font-medium text-black flex items-center gap-2">
                <i data-feather="home" class="w-5 h-5"></i> Dashboard
            </a>
        @endif

        @if (Request::is('user/materi/view') || Route::is('user.materi.detail'))
            <a href="/user/materi/view" class="bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white flex items-center gap-2">
                <i data-feather="book-open" class="w-5 h-5"></i> Materi
            </a>
        @else
            <a href="/user/materi/view" class="bg-white w-full px-4 py-2 rounded-full font-medium text-black flex items-center gap-2">
                <i data-feather="book-open" class="w-5 h-5"></i> Materi
            </a>
        @endif

        @if (Request::is('user/proyek') || Route::is('user.upload.kerja.proyek'))
            <a href="/user/proyek" class="bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white flex items-center gap-2">
                <i data-feather="briefcase" class="w-5 h-5"></i> Proyek
            </a>
        @else
            <a href="/user/proyek" class="bg-white w-full px-4 py-2 rounded-full font-medium text-black flex items-center gap-2">
                <i data-feather="briefcase" class="w-5 h-5"></i> Proyek
            </a>
        @endif

        @if (Request::is('user/kelompok') || Route::is('user.kuis.kerja'))
            <a href="/user/kelompok" class="bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white flex items-center gap-2">
                <i data-feather="users" class="w-5 h-5"></i> Kelompok Kerja
            </a>
        @else
            <a href="/user/kelompok" class="bg-white w-full px-4 py-2 rounded-full font-medium text-black flex items-center gap-2">
                <i data-feather="users" class="w-5 h-5"></i> Kelompok Kerja
            </a>
        @endif

        @if (Request::is('user/penilaian'))
            <a href="/user/penilaian" class="bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white flex items-center gap-2">
                <i data-feather="check-circle" class="w-5 h-5"></i> Penilaian & Evaluasi
            </a>
        @else
            <a href="/user/penilaian" class="bg-white w-full px-4 py-2 rounded-full font-medium text-black flex items-center gap-2">
                <i data-feather="check-circle" class="w-5 h-5"></i> Penilaian & Evaluasi
            </a>
        @endif
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" 
            class="bg-red-500 flex items-center gap-2 rounded-full border border-transparent border-dashed hover:border-red-500 font-bold text-white hover:text-red-500"
            onclick="event.preventDefault(); this.closest('form').submit();">
            <i data-feather="log-out" class="w-5 h-5"></i> {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</div>

        <div class="w-full h-screen overflow-y-scroll">            
            @if (Request::is('dashboard'))
                @include('user.home')
            @elseif (Request::is('user/materi/view'))
                @include('user.materi')
            @elseif (Route::is('user.materi.detail'))
                @include('user.detail_materi')
            @elseif (Route::is('user.proyek'))
                @include('user.proyek')
            @elseif (Route::is('user.proyek.kerja'))
                @include('user.proyek_penugasan')
            @elseif (Route::is('user.kelompok'))
                @include('user.kelompok')
            @elseif (Route::is('user.kuis.kerja'))
                @include('user.quis_kerja')
            @elseif (Route::is('user.penilaian'))
                @include('user.penilaian')
            @endif
        </div>
        
        <!-- Aktifkan ikon -->
        <script>
            feather.replace();
        </script>
    </body>
</html>
