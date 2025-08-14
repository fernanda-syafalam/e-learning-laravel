@extends('layouts.app')

@section('title', 'Penilaian & Evaluasi')

@section('content')
<div class="w-full p-8 md:p-12 lg:p-16 overflow-y-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <h1 class="text-3xl font-bold text-blue-700">📊 Penilaian & Evaluasi</h1>
        <!-- <div class="flex gap-3">
            <a href="{{ route('admin.create.quis') }}" 
               class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white shadow-md transition-all">
                ➕ Buat Quiz
            </a>
            <a href="{{ route('admin.list.quis') }}" 
               class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white shadow-md transition-all">
                📄 Lihat Kuis
            </a>
        </div> -->
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Nilai -->
    @if($nilaiQuis->count() > 0)
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-gray-800">
                <thead class="bg-blue-600 text-white text-left">
                    <tr>
                        <th class="py-3 px-4 font-semibold">Nama Siswa</th>
                        <th class="py-3 px-4 font-semibold">Quiz</th>
                        <th class="py-3 px-4 font-semibold">Nilai</th>
                        <th class="py-3 px-4 font-semibold">Tanggal</th>
                        <th class="py-3 px-4 font-semibold">Evaluasi</th>
                        <th class="py-3 px-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaiQuis as $nilai)
                        <tr class="border-b hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4">{{ $nilai->user->name }}</td>
                            <td class="py-3 px-4">{{ $nilai->quis->judul ?? 'Quiz tidak ditemukan' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded text-xs font-semibold 
                                    {{ $nilai->total >= 80 ? 'bg-green-100 text-green-800' : 
                                       ($nilai->total >= 60 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $nilai->total }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $nilai->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-3 px-4 max-w-xs">
                                @if($nilai->evaluate)
                                    <p class="text-sm text-gray-700">{{ Str::limit($nilai->evaluate->message, 100) }}</p>
                                @else
                                    <span class="text-gray-400 italic">Belum ada evaluasi</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <button 
                                    onclick="openModal({{ $nilai->id }}, '{{ addslashes($nilai->evaluate->message ?? '') }}')" 
                                    class="px-3 py-1 rounded-lg text-white bg-blue-500 hover:bg-blue-600 shadow-sm transition">
                                    {{ $nilai->evaluate ? '✏ Edit' : '➕ Tambah' }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12 bg-blue-50 rounded-lg border border-blue-200">
            <p class="text-blue-600 font-medium mb-2">Belum ada nilai quiz yang tersedia</p>
            <p class="text-sm text-blue-400">Silakan buat quiz terlebih dahulu</p>
        </div>
    @endif

</div>

<!-- Modal Evaluasi -->
<div id="evaluasiModal" class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
        <h3 class="text-lg font-semibold text-blue-700 mb-4">✏ Evaluasi Siswa</h3>
        <form id="evaluasiForm" action="{{ route('admin.simpan.evaluasi') }}" method="POST">
            @csrf
            <input type="hidden" id="nilai_id" name="id_nilai">
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Evaluasi:</label>
                <textarea id="message" name="message" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Tulis evaluasi untuk siswa ini..."></textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeModal()" 
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(nilaiId, message) {
    document.getElementById('nilai_id').value = nilaiId;
    document.getElementById('message').value = message;
    document.getElementById('evaluasiModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('evaluasiModal').classList.add('hidden');
    document.getElementById('evaluasiForm').reset();
}

document.getElementById('evaluasiModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>
@endsection
