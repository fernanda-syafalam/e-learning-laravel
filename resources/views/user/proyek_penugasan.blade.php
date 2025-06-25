<div class="w-full p-16 overflow-y-auto bg-gray-50 min-h-screen">

  <div class="w-full mb-8">
    <h1 class="text-3xl font-semibold mb-4">Proyek &gt; Penugasan</h1>
    <h2 class="text-xl font-semibold mb-2">Tugas {{ $proyek->id }} - {{ $proyek->judul }}</h2>
    <p class="text-md text-gray-600 mb-4">Deadline: <time datetime="{{ $proyek->deadline }}">{{ $proyek->deadline }}</time></p>
  </div>
  
  <form action="{{ route('user.upload.kerja.proyek') }}" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md mx-auto">
    @csrf

    <div class="mb-6">
      <p class="text-lg text-gray-700 mb-6 pb-2 border-b-2">{{ $proyek->deskripsi }}</p>

      <input type="number" name="proyek_id" class="hidden" value="{{ $proyek->id }}"/>

      <label for="source" class="block mb-2 font-medium text-gray-800">Upload File Tugas</label>
      <input
        type="file"
        id="source"
        name="file"
        class="w-full rounded-md border border-gray-300 p-4 cursor-pointer hover:border-gray-500 transition"
        aria-describedby="fileHelp"
        required
      />
      <p id="fileHelp" class="mt-1 text-sm text-gray-500">Pilih file tugas yang akan dikumpulkan (format PDF, DOCX, ZIP, dll).</p>
    </div>
    
    <button
      type="submit"
      class="bg-[#5f5757] w-full px-6 py-3 rounded-md font-semibold text-white hover:bg-[#474141] transition"
    >
      Kumpulkan
    </button>
  </form>

</div>
