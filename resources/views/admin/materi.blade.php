<div class="w-full p-8 md:p-16 overflow-y-auto min-h-screen">

    <!-- Judul -->
    <div class="w-full mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Materi Guru</h1>
        <p class="text-gray-600 mt-1">Kelola dan tambahkan materi pembelajaran Anda di sini</p>
    </div>


    <!-- Form Tambah Materi -->
    <div class="p-6 bg-white rounded-lg shadow-md border border-gray-100">
        <h2 class="text-2xl font-semibold text-blue-500 border-b border-gray-200 pb-2 mb-4">Tambahkan Materi / Tema</h2>
        
        @if (session('add-materi-success'))
            <div class="mt-2 p-3 rounded-md bg-green-50 border border-green-300 text-green-700">
                {{ session('add-materi-success') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin.tambah.materi') }}" class="space-y-6">
            @csrf    
            <input type="number" name="teachid" value="{{ Auth::user()->id }}" hidden/>
            
            <!-- Judul -->
            <div>
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul Materi / Tema</label>
                <input type="text" id="judul" name="judul" 
                       class="w-full rounded-md border border-gray-300 p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                       placeholder="Masukkan judul materi..." required/>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" 
                          class="w-full h-40 resize-none rounded-md border border-gray-300 p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                          placeholder="Tuliskan deskripsi materi..." required></textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-5 py-2 rounded-md bg-blue-400 text-white font-medium hover:bg-blue-500 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>

</div>
