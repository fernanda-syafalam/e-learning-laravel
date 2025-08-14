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
        <div class="w-1/5 h-screen bg-white p-4 shadow-lg justify-between flex flex-col">

            <div class="w-full flex flex-col gap-4">
    <a href="/" class="text-3xl mb-6 font-bold text-blue-400">CONERING</a>
    
    @if (Request::is('dashboard'))
        <a href="/dashboard" class="flex items-center gap-2 bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white">
            <i data-feather="home"></i>
            Dashboard
        </a>
    @else
        <a href="/dashboard" class="flex items-center gap-2 bg-white w-full px-4 py-2 rounded-full font-medium text-black hover:bg-gray-100">
            <i data-feather="home"></i>
            Dashboard
        </a>
    @endif

    @if (Request::is('admin/materi'))
        <a href="/admin/materi" class="flex items-center gap-2 bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white">
            <i data-feather="book-open"></i>
            Materi
        </a>
    @else
        <a href="/admin/materi" class="flex items-center gap-2 bg-white w-full px-4 py-2 rounded-full font-medium text-black hover:bg-gray-100">
            <i data-feather="book-open"></i>
            Materi
        </a>
    @endif

    @if (Request::is('admin/proyek') || Request::is('admin/monitor/proyek'))
        <a href="/admin/proyek" class="flex items-center gap-2 bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white">
            <i data-feather="briefcase"></i>
            Proyek
        </a>
    @else
        <a href="/admin/proyek" class="flex items-center gap-2 bg-white w-full px-4 py-2 rounded-full font-medium text-black hover:bg-gray-100">
            <i data-feather="briefcase"></i>
            Proyek
        </a>
    @endif

    @if (Request::is('admin/kelompok/kerja') || Request::is('admin/detail/quis') || Request::is('admin/create/quis') || Request::is('admin/list/quis'))
        <a href="/admin/kelompok/kerja" class="flex items-center gap-2 bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white">
            <i data-feather="users"></i>
            Kelompok kerja
        </a>
    @else
        <a href="/admin/kelompok/kerja" class="flex items-center gap-2 bg-white w-full px-4 py-2 rounded-full font-medium text-black hover:bg-gray-100">
            <i data-feather="users"></i>
            Kelompok kerja
        </a>
    @endif

    @if (Request::is('admin/penilaian/evaluasi'))
        <a href="/admin/penilaian/evaluasi" class="flex items-center gap-2 bg-blue-400 w-full px-4 py-2 rounded-full font-medium text-white">
            <i data-feather="check-circle"></i>
            Penilaian & Evaluasi
        </a>
    @else
        <a href="/admin/penilaian/evaluasi" class="flex items-center gap-2 bg-white w-full px-4 py-2 rounded-full font-medium text-black hover:bg-gray-100">
            <i data-feather="check-circle"></i>
            Penilaian & Evaluasi
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
            @if (session('view') === 'detail_quis')
                @include('admin.form_detail_kuis')
            @elseif (session('view') === 'list_kuis')
                @include('admin.list_kuis')
            @elseif (Request::is('dashboard'))
                @include('admin.home')
            @elseif (Request::is('admin/materi'))
                @include('admin.materi')
            @elseif (Request::is('admin/proyek'))
                @include('admin.proyek')
            @elseif (Request::is('admin/kelompok/kerja'))
                @include('admin.kelompok_kerja')
            @elseif (Request::is('admin/penilaian/evaluasi'))
                @include('admin.penilaian_evaluasi')
            @elseif (Request::is('admin/create/quis'))
                @include('admin.form_kuis')
            @elseif (Route::is('admin.detail.quis'))
                @include('admin.form_detail_kuis')
            @elseif (Request::is('admin/edit/quis'))
                @include('admin.form_kuis')
            @elseif (Request::is('admin/list/quis'))
                @include('admin.list_kuis')
            @elseif (Request::is('admin/monitor/proyek'))
                @include('admin.monitor_proyek')
            @elseif (Request::is('admin/penilaian/evaluasi'))
                @include('admin.penilaian_evaluasi')\
            @elseif (Request::is('admin/kelompok/kerja') || Request::is('admin/detail/quis') || Request::is('admin/create/quis') || Request::is('admin/list/quis'))
                @include('admin.kelompok_kerja')
            @else 
                <h1>None</h1>
            @endif
        </div>
        
        <!-- Aktifkan ikon -->
        <script>
            feather.replace();
        </script>
    </body>
</html>
