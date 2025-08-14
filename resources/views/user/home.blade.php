<div class="min-h-screen p-8 overflow-y-auto">

    {{-- Dashboard Title --}}
    <div class=" mx-auto">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>

        {{-- Welcome Card --}}
        <div class="bg-white rounded-xl shadow-md p-6 mt-4 border border-gray-100">
            <h1 class="text-2xl font-semibold text-gray-800">Selamat Datang di <span class="text-blue-600">Conering</span></h1>
            <p class="text-gray-600 mt-2">Media Pembelajaran Project Based Learning</p>
        </div>

        {{-- Announcement Card --}}
        <div class="bg-white rounded-xl shadow-md p-6 mt-6 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Pengumuman</h2>

            <div class="flex items-start gap-6 mt-6">
                {{-- Profile Icon + Name --}}
                <div class="flex flex-col items-center w-24">
                    <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center shadow-sm">
                        <svg class="w-10 h-10 text-gray-500" viewBox="0 0 16 16" fill="currentColor">
                            <path d="m 8 1 c -1.65625 0 -3 1.34375 -3 3 s 1.34375 3 3 3 s 3 -1.34375 3 -3 s -1.34375 -3 -3 -3 z m -1.5 7 c -2.492188 0 -4.5 2.007812 -4.5 4.5 v 0.5 c 0 1.109375 0.890625 2 2 2 h 8 c 1.109375 0 2 -0.890625 2 -2 v -0.5 c 0 -2.492188 -2.007812 -4.5 -4.5 -4.5 z m 0 0"/>
                        </svg>
                    </div>
                    <h2 class="mt-3 text-sm font-medium text-gray-800 text-center">
                        @if ($guru)
                            {{ $guru->name }}
                        @endif
                    </h2>
                </div>

                {{-- Announcement Message --}}
                <div class="flex-1">
                    <p class="w-full min-h-[88px] bg-gray-50 p-4 rounded-lg border border-gray-200 text-gray-700">
                        @if ($pengumuman)
                            {{ $pengumuman->pesan }}
                        @else
                            Tidak ada pengumuman saat ini.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
