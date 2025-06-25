<div class="w-full p-16 overflow-y-auto">

    <div class="w-full flex mb-6">
        <a href="{{ route('admin.list.quis') }}" class="cursor-pointer border-b text-blue-500 font-medium">< Kembali</a>
    </div>
    
    <h2 class="text-2xl">Pembuatan Kuis</h2>
    <div class="p-4 mt-4 bg-gray-200">
        <form method="post" action="{{ route('admin.tambah.kuis') }}" class="mt-6">
            @csrf    
            <div class="w-full flex flex-col items-start">
                <div class="flex flex-col mb-4 w-full">
                    <label for="judul" class="text-lg">Judul Kuis</label>
                    <input type="text" name="judul" id="judul" class="w-full p-2 bg-white focus:outline-gray-300" required/>
                </div>
                <div class="w-full flex flex-col items-start mb-6">
                    <label for="total_quis" class="text-lg">Total Soal</label>
                    <input type="number" min="1" name="total_soal" value="1" id="total_quis" class="w-full p-2 bg-white focus:outline-gray-300" required/>
                </div>
                <div class="flex flex-col mb-4 w-full">
                    <label for="timer" class="text-lg">Waktu Pengerjaan</label>
                    <input type="time" name="waktu_pengerjaan" id="timer" class="w-full cursor-pointer p-2 bg-white focus:outline-gray-300" required/>
                </div>
                <div class="flex flex-col mb-4 w-full"> 
                    <label for="deadline" class="text-lg">Deadline Kuis</label>
                    <input type="datetime-local" name="deadline" id="deadline" class="w-full cursor-pointer p-2 bg-white focus:outline-gray-300" required/>
                </div>
            </div>
            <div class="w-full flex justify-start mt-6">
                <button type="submit" class="cursor-pointer p-2 rounded-md bg-[#5f5757] text-white font-medium">Submit</button>
            </div>
        </form>
    </div>

</div>