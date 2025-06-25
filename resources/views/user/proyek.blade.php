<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Proyek</h1>
    </div>
    
    <div class="mt-4 flex flex-col gap-2">
        @foreach ($proyek as $pro)
            @php
                $penugasanUser = $penugasan->first(function ($pen) use ($pro) {
                    return $pen->id_user == Auth::user()->id && $pen->id_proyek == $pro->id;
                });
            @endphp

            <div class="w-full bg-gray-200 p-4 rounded-md flex justify-between items-center">
                <h2 class="text-xl font-bold">{{ $pro->judul }}</h2>

                @if ($penugasanUser)
                    <span class="font-medium text-white bg-gray-400 rounded-md p-2 cursor-not-allowed select-none">
                        Telah dikerjakan
                    </span>
                @else
                    <a href="{{ url('user/proyek/kerja', $pro->id) }}"
                    class="font-medium text-white bg-[#5f5757] rounded-md p-2 hover:bg-[#4a4545]">
                        Kerjakan
                    </a>
                @endif
            </div>
        @endforeach
    </div>

</div>