@extends('layouts.app')

@section('title', 'Penilaian dan Evaluasi')

@section('content')
<div class="w-full p-16 overflow-y-auto">

    <div class="w-full flex justify-between mb-6">
        <h1 class="text-3xl">Penilaian dan Evaluasi</h1>
        <div class="flex gap-2">
            <a href="{{ route('admin.create.quis') }}" class="cursor-pointer hover:opacity-90 p-2 rounded-md bg-[#5f5757] text-white font-medium">Buat Quiz</a>
            <a href="{{ route('admin.list.quis') }}" class="cursor-pointer hover:opacity-90 p-2 rounded-md bg-[#5f5757] text-white font-medium">Lihat Kuis</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($nilaiQuis->count() > 0)
        <div class="bg-gray-200 p-4 rounded-md">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-300">
                        <th class="text-left py-2">Nama Siswa</th>
                        <th class="text-left py-2">Quiz</th>
                        <th class="text-left py-2">Nilai</th>
                        <th class="text-left py-2">Tanggal</th>
                        <th class="text-left py-2">Evaluasi</th>
                        <th class="text-left py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaiQuis as $nilai)
                        <tr class="border-b border-gray-300">
                            <td class="py-2">{{ $nilai->user->name }}</td>
                            <td class="py-2">{{ $nilai->quis->judul ?? 'Quiz tidak ditemukan' }}</td>
                            <td class="py-2">
                                <span class="px-2 py-1 rounded text-sm font-medium
                                    {{ $nilai->total >= 80 ? 'bg-green-100 text-green-800' : 
                                       ($nilai->total >= 60 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $nilai->total }}
                                </span>
                            </td>
                            <td class="py-2">{{ $nilai->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-2">
                                @if($nilai->evaluate)
                                    <div class="max-w-xs">
                                        <p class="text-sm">{{ Str::limit($nilai->evaluate->message, 100) }}</p>
                                    </div>
                                @else
                                    <span class="text-gray-400">Belum ada evaluasi</span>
                                @endif
                            </td>
                            <td class="py-2">
                                <button onclick="openModal({{ $nilai->id }}, '{{ addslashes($nilai->evaluate->message ?? '') }}')" 
                                        class="text-blue-600 hover:text-blue-900 cursor-pointer">
                                    {{ $nilai->evaluate ? 'Edit' : 'Tambah' }} Evaluasi
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-8 bg-gray-200 rounded-md">
            <p class="text-gray-500">Belum ada nilai quiz yang tersedia</p>
        </div>
    @endif

</div>

<!-- Modal Evaluasi -->
<div id="evaluasiModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Evaluasi Siswa</h3>
            <form id="evaluasiForm" action="{{ route('admin.simpan.evaluasi') }}" method="POST">
                @csrf
                <input type="hidden" id="nilai_id" name="id_nilai">
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Evaluasi:</label>
                    <textarea id="message" name="message" rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Tulis evaluasi untuk siswa ini..."></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" 
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-[#5f5757] text-white rounded-md hover:opacity-90">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
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

// Tutup modal jika klik di luar modal
document.getElementById('evaluasiModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>
@endsection
