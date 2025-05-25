<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Materi Guru</h1>
        <!-- <div class="bg-gray-200 p-4 mt-4 pb-8">
            <h1 class="text-3xl">Selamat Datang di Conering</h1>
            <p>Media Pembelajaran Project Based Learning<p>
        </div> -->
    </div>
    
    <div class="p-4 mt-4 bg-gray-200">
        <h2 class="text-2xl border-b w-[300px] p-2">Tambahkan Materi / Tema</h2>
        @if (session('add-materi-success'))
            <div class="alert mt-2 alert-success text-green-500 bg-green-200 border border-dashed border-green-500 p-2 rounded-md">
                {{ session('add-materi-success') }}
            </div>
        @endif
        <form method="post" action="{{ route('admin.tambah.materi') }}" class="mt-6">
            @csrf    
            <input type="number" name="teachid" value="{{ Auth::user()->id }}" hidden/>
            <div class="flex flex-col mb-4">
                <label for="judul" class="text-xl mb-2">Judul Materi / tema</label>
                <input type="text" class="bg-white p-2" name="judul" id="judul" required/>
            </div>
            <div class="flex flex-col">
                <label for="deskripsi" class="text-xl mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full h-40 resize-none bg-white p-2" required></textarea>
            </div>
            <div class="w-full flex justify-end mt-4">
                <button type="submit" class="cursor-pointer p-2 rounded-md bg-[#5f5757] text-white font-medium">Submit</button>
            </div>
        </form>
    </div>

</div>