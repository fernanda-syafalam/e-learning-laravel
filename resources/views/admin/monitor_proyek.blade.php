<div class="w-full p-16 overflow-y-auto">
    <div class="w-full mb-6">
        <h1 class="text-3xl">Monitor Projek</h1>
    </div>
    
    <div class="flex justify-between">
        <h2 class="text-2xl p-2 rounded-full bg-[#5f5757] text-white font-medium">Projek</h2>
        <h2 class="text-2xl p-2 rounded-full bg-[#5f5757] text-white font-medium">Status</h2>
    </div>
    <div class="mt-4 flex flex-col gap-2 max-h-[600px] overflow-y-auto">
        @foreach ($projects as $proyek)
            <div class="flex justify-between bg-gray-200 p-4 rounded-md">
                <div>
                    <h2 class="text-xl font-medium">Tugas: {{ $proyek->judul }}</h2>
                    <h2 class="text-lg">Deadline: {{ $proyek->deadline }}</h2>
                </div>
                <div>
                    @php
                        $deadlineTerlewat = \Carbon\Carbon::parse($proyek->deadline)->isPast();
                    @endphp
                    @if ($deadlineTerlewat)
                        <span class="font-medium text-white bg-gray-400 rounded-md p-2 cursor-not-allowed select-none">
                            Nonaktif
                        </span>
                    @else
                        <span class="font-medium text-white bg-green-400 rounded-md p-2 select-none">
                            Aktif
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-end items-center mt-4">
        <a href="{{ route('admin.proyek') }}" class="cursor-pointer p-2 rounded-md bg-[#5f5757] text-white font-medium">< Kembali</a>
    </div>
</div>