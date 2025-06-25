<div class="w-full p-16 overflow-y-auto">

    <div class="w-full flex justify-between mb-6">
        <h1 class="text-3xl">Kelompok Kerja [Maintenance]</h1>
        <div class="flex gap-2">
            <a href="{{ route('admin.list.quis') }}" class="cursor-pointer hover:opacity-90 p-2 rounded-md bg-[#5f5757] text-white font-medium">Lihat Kuis</a>
        </div>
    </div>
    
    <h2 class="text-2xl">List Kelompok Kerja</h2>
    <div class="p-4 mt-4 bg-gray-200">
        <div class="w-full flex flex-col items-start">
            <div class="flex flex-col mb-4 w-full">
                <label for="kelompok1" class="text-lg">Kelompok 1</label>
                <input type="text" name="kelompok1" id="kelompok1" readonly class="w-full cursor-default p-2 bg-white outline-none ring-none" required/>
            </div>
            <div class="flex flex-col mb-4 w-full">
                <label for="kelompok2" class="text-lg">Kelompok 2</label>
                <input type="text" name="kelompok2" id="kelompok2" readonly class="w-full cursor-default p-2 bg-white outline-none ring-none" required/>
            </div>
            <div class="flex flex-col mb-4 w-full">
                <label for="kelompok3" class="text-lg">Kelompok 3</label>
                <input type="text" name="kelompok3" id="kelompok3" readonly class="w-full cursor-default p-2 bg-white outline-none ring-none" required/>
            </div>
            <div class="flex flex-col mb-4 w-full">
                <label for="kelompok4" class="text-lg">Kelompok 3</label>
                <input type="text" name="kelompok4" id="kelompok4" readonly class="w-full cursor-default p-2 bg-white outline-none ring-none" required/>
            </div>
            <div class="flex flex-col mb-4 w-full">
                <label for="kelompok5" class="text-lg">Kelompok 5</label>
                <input type="text" name="kelompok5" id="kelompok5" readonly class="w-full cursor-default p-2 bg-white outline-none ring-none" required/>
            </div>
        </div>
    </div>
</div>