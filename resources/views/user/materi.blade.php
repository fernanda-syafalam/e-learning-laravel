<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Materi</h1>
    </div>
    
    <div class="mt-4 flex flex-col gap-2">
        @foreach ($materi as $mat)
            <div class="w-full bg-gray-200 p-4 rounded-md flex justify-between items-center">
                <h2 class="text-xl font-bold">{{ $mat->judul }}</h2>
                <a href="{{ url('user/materi/detail', $mat->id) }}" class="font-medium text-white bg-[#5f5757] rounded-md p-2">Buka</a>
            </div>
        @endforeach
    </div>

</div>