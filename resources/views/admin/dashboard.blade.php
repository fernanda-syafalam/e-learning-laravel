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
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-white flex">
        <div class="w-1/5 h-screen bg-gray-200 p-4 justify-between flex flex-col">

            <div class="w-full flex flex-col gap-4">
                <a href="/" class="text-3xl mb-6 font-serif">CONERING</a>
                @if (Request::is('dashboard'))
                    <a href="/dashboard" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Dashboard</a>
                @else
                    <a href="/dashboard" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Dashboard</a>
                @endif

                @if (Request::is('admin/materi'))
                    <a href="/admin/materi" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Materi</a>
                @else
                    <a href="/admin/materi" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Materi</a>
                @endif

                @if (Request::is('admin/proyek') || Request::is('admin/monitor/proyek'))
                    <a href="/admin/proyek" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Proyek</a>
                @else
                    <a href="/admin/proyek" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Proyek</a>
                @endif

                @if (Request::is('admin/kelompok/kerja') || Request::is('admin/detail/quis') || Request::is('admin/create/quis') || Request::is('admin/list/quis'))
                    <a href="/admin/kelompok/kerja" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Kelompok kerja</a>
                @else
                    <a href="/admin/kelompok/kerja" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Kelompok kerja</a>
                @endif

                @if (Request::is('admin/penilaian/evaluasi'))
                    <a href="/admin/penilaian/evaluasi" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Penilaian & Evaluasi</a>
                @else
                    <a href="/admin/penilaian/evaluasi" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Penilaian & Evaluasi</a>
                @endif
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" class="bg-red-500 rounded-md border border-transparent border-dashed hover:border-red-500 font-bold text-white hover:text-red-500"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
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
        
    </body>
</html>
