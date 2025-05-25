<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Dashboard Guru</h1>
        <div class="bg-gray-200 p-4 mt-4 pb-8">
            <h1 class="text-3xl">Selamat Datang di Conering</h1>
            <p>Media Pembelajaran Project Based Learning<p>
        </div>
    </div>
    
    <div class="p-4 mt-4 bg-gray-200">
        <h2 class="text-2xl border-b w-[300px] p-2">Tambahkan Pengumuman</h2>
        <form method="post" action="{{ route('admin.tambah.pengumuman') }}" class="mt-6">
            @csrf    
            <input type="number" name="teachid" value="{{ Auth::user()->id }}" hidden/>
            <div class="w-full flex flex-col items-start">
                <div class="flex w-full items-start gap-4">
                    <svg class="w-22 h-22 bg-white" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="m 8 1 c -1.65625 0 -3 1.34375 -3 3 s 1.34375 3 3 3 s 3 -1.34375 3 -3 s -1.34375 -3 -3 -3 z m -1.5 7 c -2.492188 0 -4.5 2.007812 -4.5 4.5 v 0.5 c 0 1.109375 0.890625 2 2 2 h 8 c 1.109375 0 2 -0.890625 2 -2 v -0.5 c 0 -2.492188 -2.007812 -4.5 -4.5 -4.5 z m 0 0" fill="#2e3436"></path> </g></svg>
                    <div class="w-full">
                        <textarea name="pesan" class="w-full min-h-22 bg-white p-2" placeholder="Add new announcement" required></textarea>
                        @if (session('add-announcement-success'))
                            <div class="alert mt-2 alert-success text-green-500 bg-green-200 border border-dashed border-green-500 p-2 rounded-md">
                                {{ session('add-announcement-success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-end mt-6">
                <button type="submit" class="cursor-pointer p-2 rounded-md bg-[#5f5757] text-white font-medium">Submit</button>
            </div>
        </form>
    </div>

</div>