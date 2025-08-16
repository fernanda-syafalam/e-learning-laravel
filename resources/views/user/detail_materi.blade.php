<div class="w-full p-16 overflow-y-auto min-h-screen">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ url('user/materi/view') }}" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke daftar materi
        </a>
    </div>

    <!-- Judul -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Detail Materi</h1>
        <p class="text-xl text-gray-600">{{ $materi->judul }}</p>
    </div>
    
    <!-- Deskripsi -->
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Materi</h2>
        <p class="text-gray-700 leading-relaxed">
            {{ $materi->deskripsi }}
        </p>
    </div>

</div>
