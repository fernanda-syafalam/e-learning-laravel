<div class="w-full p-8 md:p-16 overflow-y-auto bg-gray-50 min-h-screen">

    

    <!-- Link Monitor Projek -->
    <div class="flex justify-between mb-8 items-center">
        <!-- Judul -->
        <div class="">
            <h1 class="text-3xl font-bold text-gray-800">Projek Guru</h1>
            <p class="text-gray-600">Kelola dan pantau projek pembelajaran dengan mudah</p>
        </div>

        <a href="{{ route('admin.monitor.proyek') }}" 
           class="px-5 py-2 rounded-md bg-blue-400 text-white font-medium hover:bg-blue-500 transition">
            Monitor Projek
        </a>
    </div>

    <!-- Form Tambah Projek -->
    <div class="p-6 bg-white rounded-lg shadow-md border border-gray-100">
        <h2 class="text-2xl font-semibold text-blue-500 border-b border-gray-200 pb-2 mb-4">Tambahkan Projek Baru</h2>
        
        @if (session('success'))
            <div class="mt-2 p-3 rounded-md bg-green-50 border border-green-300 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin.tambah.proyek') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf    
            <input type="number" name="teachid" value="{{ Auth::user()->id }}" hidden/>

            <!-- Judul Projek -->
            <div>
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul Projek</label>
                <input type="text" id="judul" name="judul" 
                       class="w-full rounded-md border border-gray-300 p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                       placeholder="Masukkan judul projek..." required/>
            </div>

            <!-- Deskripsi Projek -->
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi Projek</label>
                <textarea id="deskripsi" name="deskripsi" 
                          class="w-full min-h-24 resize-none rounded-md border border-gray-300 p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                          placeholder="Tuliskan deskripsi projek..."></textarea>
            </div>

            <!-- Upload File -->
            <div>
                <label for="files" class="block text-gray-700 font-medium mb-2">Upload File (Opsional)</label>
                <input type="file" id="files" name="files" 
                       class="w-full cursor-pointer rounded-md border border-gray-300 p-3 bg-white focus:ring-2 focus:ring-blue-400"/>
            </div>

            <!-- Deadline Projek -->
            <div>
                <label for="deadline" class="block text-gray-700 font-medium mb-2">Deadline Projek</label>
                <input type="date" id="deadline" name="deadline" 
                       class="w-full cursor-pointer rounded-md border border-gray-300 p-3 focus:ring-2 focus:ring-blue-400" required/>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-5 py-2 rounded-md bg-blue-400 text-white font-medium hover:bg-blue-500 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>

</div>
