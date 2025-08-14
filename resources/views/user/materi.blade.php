<div class="w-full p-16 overflow-y-auto">
    <div class="w-full">
        <h1 class="text-3xl font-bold">Materi</h1>
    </div>
    
    <div class="mt-4 space-y-3">
        @foreach ($materi as $mat)
            <div class="w-full bg-white shadow rounded-lg p-4 flex justify-between items-center transition">
                <h2 class="text-xl font-semibold">{{ $mat->judul }}</h2>
                <a href="{{ url('user/materi/detail', $mat->id) }}" 
                   class="px-4 py-2 bg-blue-400 text-white rounded-md hover:bg-blue-500 transition">
                   Buka
                </a>
            </div>
        @endforeach
    </div>
</div>
