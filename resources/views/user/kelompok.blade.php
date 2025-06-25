<div class="w-full p-16 overflow-y-auto">

    <div class="w-full">
        <h1 class="text-3xl">Kelompok Kerja</h1>
    </div>
    
    <div class="mt-4 flex flex-col gap-2">
        @foreach($quis as $q)
            @php
                $nilai = $nilai_quis->where('id_quis', $q->id)->first();
            @endphp
            <div class="flex items-center justify-between p-2 bg-gray-200 rounded-md">
                <h1 class="font-bold text-xl">{{ $q->judul }}</h1>

                @if (!$nilai)
                    <a href="{{ url('kuis/kerja/' . $q->id) }}" class="font-bold text-xl p-2 bg-green-500 text-white rounded-md">
                        Mulai
                    </a>
                @else
                    <h1 class="font-bold text-xl p-2 bg-gray-500 text-white rounded-md">
                        {{ $nilai->total }}
                    </h1>
                @endif
            </div>
        @endforeach
    </div>

</div>