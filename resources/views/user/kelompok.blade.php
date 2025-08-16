@extends('layouts.app')

@section('title', 'Kelompok Kerja')

@section('content')
<div class="w-full p-6 md:p-12 lg:p-16 min-h-screen overflow-y-auto">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Kelompok Kerja Saya</h1>
        <p class="text-gray-500 text-sm mt-1">Lihat anggota kelompok dan daftar quiz yang tersedia</p>
    </div>

    {{-- Anggota Kelompok --}}
    @if($kelompok)
        <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 010 7.75" />
                </svg>
                Anggota Kelompok
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach (['user1' => 'bg-blue-500', 'user2' => 'bg-green-500', 'user3' => 'bg-yellow-500', 'user4' => 'bg-red-500', 'user5' => 'bg-purple-500'] as $userKey => $colorClass)
                    @if($kelompok->$userKey)
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="w-10 h-10 {{ $colorClass }} rounded-full flex items-center justify-center text-white font-bold mr-3">
                                {{ strtoupper(substr($kelompok->$userKey->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $kelompok->$userKey->name }}</p>
                                <p class="text-sm text-gray-500">{{ $kelompok->$userKey->email }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-4 text-sm text-gray-600">
                Total anggota: {{ count($kelompok->members) }} orang
            </div>
        </div>
    @else
        <div class="bg-white text-center p-8 rounded-xl shadow-md mb-8">
            <p class="text-gray-500 text-lg mb-2">Anda belum ditugaskan ke dalam kelompok</p>
            <p class="text-sm text-gray-400">Silakan tunggu guru membuat kelompok</p>
        </div>
    @endif

    {{-- Daftar Quiz --}}
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2m-4-8a9 9 0 100 18 9 9 0 000-18z" />
            </svg>
            Daftar Quiz
        </h2>

        @if($quis->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($quis as $quiz)
                    @php
                        $sudahDikerjakan = $nilai_quis->where('id_quis', $quiz->id)->first();
                    @endphp
                    <div class="p-5 rounded-xl border {{ $sudahDikerjakan ? 'border-green-400 bg-green-50' : 'border-gray-200 bg-gray-50' }} shadow-sm hover:shadow-md transition">
                        <h3 class="text-lg font-bold text-gray-800 mb-3">{{ $quiz->judul }}</h3>
                        <div class="text-sm text-gray-600 space-y-1 mb-4">
                            <p>📄 Total soal: {{ $quiz->total_soal }}</p>
                            <p>⏱ Waktu: {{ $quiz->waktu_pengerjaan }} menit</p>
                            <p>📅 Deadline: {{ \Carbon\Carbon::parse($quiz->deadline)->format('d/m/Y H:i') }}</p>
                        </div>

                        @if($sudahDikerjakan)
                            <div class="flex items-center justify-between">
                                <span class="text-green-700 font-medium">✅ Sudah dikerjakan</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm font-semibold">
                                    Nilai: {{ $sudahDikerjakan->total }}
                                </span>
                            </div>
                        @else
                            <a href="{{ route('user.kuis.kerja', $quiz->id) }}" 
                               class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg font-medium transition">
                                Kerjakan Quiz
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-8 bg-gray-50 rounded-xl border border-gray-200">
                <p class="text-gray-500">Belum ada quiz yang tersedia</p>
            </div>
        @endif
    </div>

</div>
@endsection
