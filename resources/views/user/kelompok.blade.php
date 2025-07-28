@extends('layouts.app')

@section('title', 'Kelompok Kerja')

@section('content')
<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Kelompok Kerja Saya</h1>
    </div>

    @if($kelompok)
        <div class="mt-4 bg-gray-200 p-4 rounded-md">
            <h2 class="text-2xl mb-4">Anggota Kelompok:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if($kelompok->user1)
                    <div class="flex items-center p-3 bg-white rounded-md shadow-sm">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                            {{ substr($kelompok->user1->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium">{{ $kelompok->user1->name }}</p>
                            <p class="text-sm text-gray-500">{{ $kelompok->user1->email }}</p>
                        </div>
                    </div>
                @endif
                @if($kelompok->user2)
                    <div class="flex items-center p-3 bg-white rounded-md shadow-sm">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                            {{ substr($kelompok->user2->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium">{{ $kelompok->user2->name }}</p>
                            <p class="text-sm text-gray-500">{{ $kelompok->user2->email }}</p>
                        </div>
                    </div>
                @endif
                @if($kelompok->user3)
                    <div class="flex items-center p-3 bg-white rounded-md shadow-sm">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                            {{ substr($kelompok->user3->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium">{{ $kelompok->user3->name }}</p>
                            <p class="text-sm text-gray-500">{{ $kelompok->user3->email }}</p>
                        </div>
                    </div>
                @endif
                @if($kelompok->user4)
                    <div class="flex items-center p-3 bg-white rounded-md shadow-sm">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                            {{ substr($kelompok->user4->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium">{{ $kelompok->user4->name }}</p>
                            <p class="text-sm text-gray-500">{{ $kelompok->user4->email }}</p>
                        </div>
                    </div>
                @endif
                @if($kelompok->user5)
                    <div class="flex items-center p-3 bg-white rounded-md shadow-sm">
                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                            {{ substr($kelompok->user5->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium">{{ $kelompok->user5->name }}</p>
                            <p class="text-sm text-gray-500">{{ $kelompok->user5->email }}</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="mt-4 text-sm text-gray-600">
                Total anggota: {{ count($kelompok->members) }} orang
            </div>
        </div>
    @else
        <div class="mt-4 text-center py-8 bg-gray-200 rounded-md">
            <p class="text-gray-500 mb-2">Anda belum ditugaskan ke dalam kelompok</p>
            <p class="text-sm text-gray-400">Silakan tunggu guru membuat kelompok</p>
        </div>
    @endif

    <!-- Daftar Quiz -->
    <div class="mt-8">
        <h2 class="text-2xl mb-4">Daftar Quiz</h2>
        @if($quis->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($quis as $quiz)
                    @php
                        $sudahDikerjakan = $nilai_quis->where('id_quis', $quiz->id)->first();
                    @endphp
                    <div class="bg-gray-200 p-4 rounded-md {{ $sudahDikerjakan ? 'border-2 border-green-500' : '' }}">
                        <h3 class="font-semibold mb-2">{{ $quiz->judul }}</h3>
                        <div class="text-sm text-gray-600 mb-3">
                            <p>Total soal: {{ $quiz->total_soal }}</p>
                            <p>Waktu: {{ $quiz->waktu_pengerjaan }} menit</p>
                            <p>Deadline: {{ \Carbon\Carbon::parse($quiz->deadline)->format('d/m/Y H:i') }}</p>
                        </div>
                        @if($sudahDikerjakan)
                            <div class="flex items-center justify-between">
                                <span class="text-green-600 font-medium">Sudah dikerjakan</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">
                                    Nilai: {{ $sudahDikerjakan->total }}
                                </span>
                            </div>
                        @else
                            <a href="{{ route('user.kuis.kerja', $quiz->id) }}" 
                               class="block w-full text-center bg-[#5f5757] hover:opacity-90 text-white py-2 px-4 rounded cursor-pointer">
                                Kerjakan Quiz
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-4 bg-gray-200 rounded-md">
                <p class="text-gray-500">Belum ada quiz yang tersedia</p>
            </div>
        @endif
    </div>

</div>
@endsection