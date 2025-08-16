<div class="w-full p-8 md:p-16 overflow-y-auto bg-gray-50 min-h-screen">
    
    <!-- Tombol Kembali -->
    <div class="flex justify-between items-center mb-6">
        <!-- Judul -->
        <div class="">
            <h1 class="text-3xl font-bold text-gray-800">Monitor Projek</h1>
        </div>
        
        <a href="{{ route('admin.proyek') }}" 
           class="px-4 py-2 rounded-md bg-blue-400 text-white font-medium hover:bg-blue-500 transition shadow">
            &lt; Kembali
        </a>
    </div>

    <!-- Header -->
    <div class="flex justify-between border-b">
        <h2 class="text-xl md:text-2xl px-4 py-2 font-medium ">
            Projek
        </h2>
        <h2 class="text-xl md:text-2xl px-4 py-2 font-medium ">
            Status
        </h2>
    </div>

    <!-- List Projek -->
    <div class="mt-6 flex flex-col gap-4 max-h-[600px] overflow-y-auto pr-2">
        @foreach ($projects as $proyek)
            <div class="flex justify-between items-center bg-white border border-gray-200 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div>
                    <h2 class="text-lg md:text-xl font-semibold text-gray-800">
                        Tugas: {{ $proyek->judul }}
                    </h2>
                    <h2 class="text-sm md:text-lg text-gray-500">
                        Deadline: {{ $proyek->deadline }}
                    </h2>
                </div>
                <div>
                    @php
                        $deadlineTerlewat = \Carbon\Carbon::parse($proyek->deadline)->isPast();
                    @endphp
                    @if ($deadlineTerlewat)
                        <span class="font-medium text-white bg-gray-400 rounded-md px-3 py-1 cursor-not-allowed select-none shadow">
                            Nonaktif
                        </span>
                    @else
                        <span class="font-medium text-white bg-green-400 rounded-md px-3 py-1 select-none shadow">
                            Aktif
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>
