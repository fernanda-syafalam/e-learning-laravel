<div class="w-full p-16 overflow-y-auto">

    <div class="w-full mb-6">
        <h1 class="text-3xl">Projek Guru [Maintenance]</h1>
    </div>
    
    <h2 class="text-2xl w-[300px]">Tambahkan Projek Baru</h2>
    <div class="p-4 mt-4 bg-gray-200">
       @if (session('success'))
            <p class="text-green-500 p-2 border rounded-md border-dashed">
                {{ session('success') }}
            </p>
        @endif
        <form method="post" action="{{ route('admin.tambah.proyek') }}" class="mt-6">
            @csrf    
            <input type="number" name="teachid" value="{{ Auth::user()->id }}" hidden/>
            <div class="w-full flex flex-col items-start">
                <div class="flex flex-col mb-4 w-full">
                    <label for="judul" class="text-lg font-medium">Judul Projek</label>
                    <input type="text" name="judul" id="judul" class="w-full p-2 bg-white focus:outline-gray-300" required/>
                </div>
                <div class="flex flex-col mb-4 w-full">
                    <label for="deskripsi" class="text-lg font-medium">Deskripsi Projek</label>
                    <textarea name="deskripsi" id="deskripsi" class="w-full min-h-16 max-h-64 p-2 bg-white focus:outline-gray-300"></textarea>
                </div>
                <div class="flex flex-col mb-4 w-full">
                    <label for="files" class="text-lg font-medium">Upload File (Opsional)</label>
                    <input type="file" name="files" id="files" class="w-full cursor-pointer p-2 bg-white"/>
                </div>
                <div class="flex flex-col mb-4 w-full">
                    <label for="deadline" class="text-lg font-medium">Deadline Projek</label>
                    <input type="date" name="deadline" id="deadline" class="w-full cursor-pointer p-2 bg-white focus:outline-gray-300" required/>
                </div>
            </div>
            <div class="w-full flex justify-start mt-6">
                <button type="submit" class="cursor-pointer p-2 rounded-md bg-[#5f5757] text-white font-medium">Submit</button>
            </div>
        </form>
    </div>

    <div class="flex justify-end items-center mt-4">
        <a href="{{ route('admin.monitor.proyek') }}" class="cursor-pointer p-2 rounded-md bg-[#5f5757] text-white font-medium">Monitor Projek</a>
    </div>

</div>