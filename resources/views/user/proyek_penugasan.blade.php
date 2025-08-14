@extends('layouts.app')

@section('title', 'Penugasan Proyek')

@section('content')
<div class="w-full p-8 lg:p-16 overflow-y-auto  min-h-screen">

  <!-- Header -->
  <div class="mb-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-2">Proyek &gt; Penugasan</h1>
    <h2 class="text-xl font-semibold text-gray-700 mb-1">
      Tugas {{ $proyek->id }} - {{ $proyek->judul }}
    </h2>
    <p class="text-sm text-gray-500">
      Deadline: 
      <time datetime="{{ $proyek->deadline }}">
        {{ \Carbon\Carbon::parse($proyek->deadline)->format('d M Y H:i') }}
      </time>
    </p>
  </div>
  
  <!-- Form Upload -->
  <form 
    action="{{ route('user.upload.kerja.proyek') }}" 
    method="post" 
    enctype="multipart/form-data" 
    class="bg-white p-6 md:p-8 rounded-lg shadow-md w-full lg:w-3/4 xl:w-2/3 mx-auto"
  >
    @csrf

    <!-- Deskripsi -->
    <div class="mb-6">
      <p class="text-base text-gray-700 mb-6 pb-4 border-b border-gray-200 leading-relaxed">
        {{ $proyek->deskripsi }}
      </p>

      <input type="hidden" name="proyek_id" value="{{ $proyek->id }}"/>

      <!-- Upload -->
      <label for="source" class="block mb-2 font-medium text-gray-800">
        Upload File Tugas
      </label>
      <input
        type="file"
        id="source"
        name="file"
        class="w-full rounded-md border border-gray-300 p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 cursor-pointer hover:border-gray-400 transition"
        aria-describedby="fileHelp"
        required
      />
      <p id="fileHelp" class="mt-1 text-sm text-gray-500">
        Pilih file tugas (format PDF, DOCX, ZIP, dll).
      </p>
    </div>
    
    <!-- Tombol -->
    <button
      type="submit"
      class="bg-blue-500 hover:bg-blue-600 w-full px-6 py-3 rounded-md font-semibold text-white shadow-sm transition"
    >
      Kumpulkan Tugas
    </button>
  </form>

</div>
@endsection
