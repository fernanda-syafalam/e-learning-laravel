@extends('layouts.app')

@section('title', 'Penilaian Saya')

@section('content')
<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Penilaian dan Evaluasi Saya</h1>
    </div>

    @if($nilaiQuis->count() > 0)
        <div class="mt-4 bg-gray-200 p-4 rounded-md">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-300">
                        <th class="text-left py-2">Quiz</th>
                        <th class="text-left py-2">Nilai</th>
                        <th class="text-left py-2">Tanggal</th>
                        <th class="text-left py-2">Evaluasi Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaiQuis as $nilai)
                        <tr class="border-b border-gray-300">
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
                                        <p class="text-sm bg-blue-50 p-3 rounded-md border-l-4 border-blue-400">
                                            {{ $nilai->evaluate->message }}
                                        </p>
                                    </div>
                                @else
                                    <span class="text-gray-400 italic">Belum ada evaluasi</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Ringkasan Nilai -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-200 p-6 rounded-md text-center">
                <h3 class="text-lg font-semibold mb-2">Rata-rata Nilai</h3>
                <p class="text-3xl font-bold text-blue-600">
                    {{ round($nilaiQuis->avg('total'), 1) }}
                </p>
            </div>
            <div class="bg-gray-200 p-6 rounded-md text-center">
                <h3 class="text-lg font-semibold mb-2">Nilai Tertinggi</h3>
                <p class="text-3xl font-bold text-green-600">
                    {{ $nilaiQuis->max('total') }}
                </p>
            </div>
            <div class="bg-gray-200 p-6 rounded-md text-center">
                <h3 class="text-lg font-semibold mb-2">Total Quiz</h3>
                <p class="text-3xl font-bold text-purple-600">
                    {{ $nilaiQuis->count() }}
                </p>
            </div>
        </div>
    @else
        <div class="mt-4 text-center py-8 bg-gray-200 rounded-md">
            <p class="text-gray-500 mb-4">Belum ada nilai quiz yang tersedia</p>
            <p class="text-sm text-gray-400">Silakan kerjakan quiz terlebih dahulu</p>
        </div>
    @endif

</div>
@endsection
