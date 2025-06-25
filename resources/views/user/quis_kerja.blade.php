<div class="w-full p-16 overflow-y-auto">
    <div class="w-full">
        <h1 class="text-3xl font-bold mb-6">Kelompok Kerja</h1>
    </div>
    
    <form action="{{ route('user.submit.quis', $quis->id) }}" method="POST" class="flex flex-col gap-6">
        @csrf

        @foreach($soal as $s)
            <div class="p-4 bg-gray-100 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-3">{{ $s->soal }}</h2>

                <div class="flex flex-col gap-2 ml-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="soal[{{ $s->id }}]" value="A" required>
                        {{ $s->option_a }}
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="soal[{{ $s->id }}]" value="B">
                        {{ $s->option_b }}
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="soal[{{ $s->id }}]" value="C">
                        {{ $s->option_c }}
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="soal[{{ $s->id }}]" value="D">
                        {{ $s->option_d }}
                    </label>
                </div>
            </div>
        @endforeach

        <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
            Kumpulkan Jawaban
        </button>
    </form>
</div>