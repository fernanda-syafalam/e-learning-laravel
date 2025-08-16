<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        {{-- Header --}}
        <div class="flex items-center justify-between mb-10">
            <a href="{{ route('admin.kelompok.kerja') }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Kembali</span>
            </a>

            <a href="{{ route('admin.create.quis') }}" 
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-md hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="font-semibold">Buat Kuis Baru</span>
            </a>
        </div>

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="mb-8">
                <div class="rounded-xl bg-green-50 p-4 border-l-4 border-green-500 shadow-sm">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-3 text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Judul halaman --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Semua Kuis</h1>
            <p class="mt-2 text-sm text-gray-500">Kelola semua kuis dan soal yang tersedia.</p>
        </div>

        {{-- List kuis --}}
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($quis as $q)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        
                        {{-- Header card --}}
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $q->judul }}</h3>
                                <p class="mt-1 text-xs text-gray-500">ID Kuis: #{{ $q->id }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                {{ $q->deadline < now() ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                {{ $q->deadline < now() ? 'Berakhir' : 'Aktif' }}
                            </span>
                        </div>

                        {{-- Info --}}
                        <div class="mt-5 space-y-3 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Dibuat: {{ \Carbon\Carbon::parse($q->created_at)->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Deadline: {{ \Carbon\Carbon::parse($q->deadline)->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
                                </svg>
                                <span>Total Soal: {{ $q->total_soal }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                                </svg>
                                <span>Waktu: {{ $q->waktu_pengerjaan }} Menit</span>
                            </div>
                        </div>

                        {{-- Action --}}
                        <div class="mt-6 flex gap-2">
                            <a href="{{ route('admin.detail.quis', $q->id) }}" 
                               class="flex-1 px-4 py-2 bg-green-500 text-white text-sm rounded-lg hover:bg-green-600 transition">
                                Lihat Soal
                            </a>
                            <form action="{{ route('admin.delete.quis', $q->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full px-4 py-2 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition"
                                        onclick="return confirm('Yakin ingin menghapus kuis ini? Semua soal akan ikut terhapus.')">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
