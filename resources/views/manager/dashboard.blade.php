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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
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

                @if (Request::is('manage/user'))
                    <a href="/manage/user" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Manage User</a>
                @else
                    <a href="/manage/user" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Manage User</a>
                @endif

                @if (Request::is('manage/class'))
                    <a href="/manage/class" class="bg-[#5f5757] w-full px-4 py-2 rounded-md font-medium text-white">Manage Class</a>
                @else
                    <a href="/manage/class" class="bg-white w-full px-4 py-2 rounded-md font-medium text-black">Manage Class</a>
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
            @if (Request::is('dashboard'))
                @include('manager.managerhome')
            @elseif (Request::is('manage/user'))
                @include('manager.tableuser')
            @elseif (Request::is('manage/class'))
                @include('manager.tableclass')
            @endif
        </div>
        
    </body>
</html>
