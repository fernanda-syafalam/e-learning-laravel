<div class="w-full p-8 md:p-16 overflow-y-auto min-h-screen">

    <!-- Judul Dashboard -->
    <div class="w-full mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Guru</h1>
        <div class="bg-blue-400 p-6 mt-4 rounded-lg shadow-sm text-white">
            <h2 class="text-2xl font-semibold">Selamat Datang di Conering</h2>
            <p class="mt-2 text-blue-50">Media Pembelajaran Project Based Learning</p>
        </div>
    </div>

    <!-- Form Tambah Pengumuman -->
    <div class="p-6 mt-8 bg-white rounded-lg shadow-md border border-gray-100">
        <h2 class="text-2xl font-semibold border-b border-gray-200 pb-2 mb-4 text-blue-500">Tambahkan Pengumuman</h2>
        <form method="post" action="{{ route('admin.tambah.pengumuman') }}" class="space-y-6">
            @csrf    
            <input type="number" name="teachid" value="{{ Auth::user()->id }}" hidden/>
            
            <div class="flex items-start gap-4">
                <!-- Icon -->
                <div class="flex-shrink-0 w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-8 h-8 text-blue-500" viewBox="0 0 16 16" fill="currentColor">
                        <path d="m 8 1 c -1.65625 0 -3 1.34375 -3 3 s 1.34375 3 3 3 s 3 -1.34375 3 -3 s -1.34375 -3 -3 -3 z m -1.5 7 c -2.492188 0 -4.5 2.007812 -4.5 4.5 v 0.5 c 0 1.109375 0.890625 2 2 2 h 8 c 1.109375 0 2 -0.890625 2 -2 v -0.5 c 0 -2.492188 -2.007812 -4.5 -4.5 -4.5 z m 0 0"></path>
                    </svg>
                </div>

                <!-- Input -->
                <div class="flex-1">
                    <textarea 
                        name="pesan" 
                        class="w-full rounded-md min-h-64 bg-white p-3 border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
                        placeholder="Tulis pengumuman baru..."
                        required></textarea>

                    @if (session('add-announcement-success'))
                        <div class="mt-2 p-3 rounded-md bg-green-50 border border-green-300 text-green-700">
                            {{ session('add-announcement-success') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tombol -->
            <div class="w-full flex justify-end">
                <button 
                    type="submit" 
                    class="px-5 py-2 rounded-md bg-blue-400 text-white font-medium hover:bg-blue-500 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>

</div>
