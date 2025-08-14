@extends('layouts.app')

@section('title', 'Penilaian Saya')

@section('content')
<div class="w-full p-6 md:p-16 overflow-y-auto  min-h-screen">

    <div class="w-full mb-8">
        <h1 class="text-3xl font-bold text-gray-800">📊 Penilaian & Evaluasi Saya</h1>
        <p class="text-gray-500 mt-1 text-sm">Ringkasan hasil quiz yang sudah dikerjakan</p>
    </div>

    @if($nilaiQuis->count() > 0)
      <!-- Ringkasan Nilai -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Rata-rata Nilai</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">
                    {{ round($nilaiQuis->avg('total'), 1) }}
                </p>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Nilai Tertinggi</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">
                    {{ $nilaiQuis->max('total') }}
                </p>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Total Quiz</h3>
                <p class="text-3xl font-bold text-purple-600 mt-2">
                    {{ $nilaiQuis->count() }}
                </p>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full text-sm md:text-base">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Quiz</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Nilai</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Tanggal</th>
                        <th class="py-3 px-4 text-left font-semibold text-gray-700">Evaluasi Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaiQuis as $nilai)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-3 px-4">{{ $nilai->quis->judul ?? 'Quiz tidak ditemukan' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $nilai->total >= 80 ? 'bg-green-100 text-green-700' : 
                                       ($nilai->total >= 60 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ $nilai->total }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $nilai->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-3 px-4">
                                @if($nilai->evaluate)
                                    <p class="text-sm bg-blue-50 p-3 rounded-md border-l-4 border-blue-400">
                                        {{ $nilai->evaluate->message }}
                                    </p>
                                @else
                                    <span class="text-gray-400 italic">Belum ada evaluasi</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      
    @else
        <div class="mt-4 text-center py-12 bg-white shadow-sm rounded-lg">
            <p class="text-gray-500 text-lg mb-2">Belum ada nilai quiz</p>
            <p class="text-sm text-gray-400">Silakan kerjakan quiz terlebih dahulu</p>
        </div>
    @endif

</div>
@endsection
