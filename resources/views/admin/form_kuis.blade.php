<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-10 px-6">
    <div class=" mx-auto">

        {{-- Back button --}}
        <div class="mb-6">
            <a href="{{ route('admin.list.quis') }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Kembali</span>
            </a>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Pembuatan Kuis</h2>
            
            <form method="post" action="{{ route('admin.tambah.kuis') }}" class="space-y-6">
                @csrf    

                {{-- Judul Kuis --}}
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Kuis</label>
                    <input type="text" name="judul" id="judul" 
                           class="w-full rounded-lg border border-gray-300 p-3 text-gray-700 placeholder-gray-400 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Masukkan judul kuis" required/>
                </div>

                {{-- Total Soal --}}
                <div>
                    <label for="total_quis" class="block text-sm font-medium text-gray-700 mb-2">Total Soal</label>
                    <input type="number" min="1" name="total_soal" value="1" id="total_quis"
                           class="w-full rounded-lg border border-gray-300 p-3 text-gray-700 placeholder-gray-400
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                           required/>
                </div>

                {{-- Waktu Pengerjaan --}}
                <div>
                    <label for="timer" class="block text-sm font-medium text-gray-700 mb-2">Waktu Pengerjaan</label>
                    <input type="time" name="waktu_pengerjaan" id="timer"
                           class="w-full rounded-lg border border-gray-300 p-3 text-gray-700 cursor-pointer
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           required/>
                </div>

                {{-- Deadline --}}
                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Deadline Kuis</label>
                    <input type="datetime-local" name="deadline" id="deadline"
                           class="w-full rounded-lg border border-gray-300 p-3 text-gray-700 cursor-pointer
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           required/>
                </div>

                {{-- Button --}}
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md 
                                   hover:shadow-lg transition-all duration-300">
                        Simpan Kuis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
