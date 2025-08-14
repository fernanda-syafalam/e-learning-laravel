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

            <div class="w-full bg-white p-4 rounded-md shadow flex justify-between items-center">
                <h2 class="text-xl font-bold">{{ $pro->judul }}</h2>

                @if ($penugasanUser)
                    <span class="font-medium text-white bg-gray-400 rounded-md p-2 cursor-not-allowed select-none">
                        Telah dikerjakan
                    </span>
                @else
                    <a href="{{ url('user/proyek/kerja', $pro->id) }}"
                       class="font-medium text-white bg-blue-400 rounded-md p-2 hover:bg-blue-500">
                        Kerjakan
                    </a>
                @endif
            </div>
        @endforeach
    </div>

</div>
