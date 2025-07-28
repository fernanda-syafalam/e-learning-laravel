<div class="w-full p-16 overflow-y-auto">

    <div class="w-full flex justify-between mb-6">
        <h1 class="text-3xl">Kelompok Kerja</h1>
        <div class="flex gap-2">
            <form action="{{ route('admin.buat.kelompok.otomatis') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="cursor-pointer hover:opacity-90 p-2 rounded-md bg-[#5f5757] text-white font-medium">
                    Buat Kelompok Otomatis
                </button>
            </form>
            <a href="{{ route('admin.create.quis') }}" class="cursor-pointer hover:opacity-90 p-2 rounded-md bg-[#5f5757] text-white font-medium">Buat Quiz</a>
            <a href="{{ route('admin.list.quis') }}" class="cursor-pointer hover:opacity-90 p-2 rounded-md bg-[#5f5757] text-white font-medium">Lihat Kuis</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($kelompok->count() > 0)
        <h2 class="text-2xl mb-4">Daftar Kelompok</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kelompok as $index => $group)
                <div class="bg-gray-200 p-4 rounded-md">
                    <h3 class="text-lg font-semibold mb-3">Kelompok {{ $index + 1 }}</h3>
                    <div class="space-y-2">
                        @if($group->user1)
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                <span>{{ $group->user1->name }}</span>
                            </div>
                        @endif
                        @if($group->user2)
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                <span>{{ $group->user2->name }}</span>
                            </div>
                        @endif
                        @if($group->user3)
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                                <span>{{ $group->user3->name }}</span>
                            </div>
                        @endif
                        @if($group->user4)
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                <span>{{ $group->user4->name }}</span>
                            </div>
                        @endif
                        @if($group->user5)
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                <span>{{ $group->user5->name }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3 text-sm text-gray-600">
                        Total: {{ count($group->members) }} anggota
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8 bg-gray-200 rounded-md">
            <p class="text-gray-500 mb-4">Belum ada kelompok yang dibuat</p>
            <p class="text-sm text-gray-400">Klik tombol "Buat Kelompok Otomatis" untuk membuat kelompok berdasarkan nilai quiz terakhir</p>
        </div>
    @endif

    @if($users->count() > 0)
        <div class="mt-8">
            <h3 class="text-2xl mb-4">Daftar Siswa</h3>
            <div class="bg-gray-200 p-4 rounded-md">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-300">
                            <th class="text-left py-2">Nama</th>
                            <th class="text-left py-2">Email</th>
                            <th class="text-left py-2">Nilai Quiz Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @php
                                $latestScore = \App\Models\NilaiQuis::where('id_user', $user->id)
                                    ->orderBy('created_at', 'desc')
                                    ->first();
                            @endphp
                            <tr class="border-b border-gray-300">
                                <td class="py-2">{{ $user->name }}</td>
                                <td class="py-2">{{ $user->email }}</td>
                                <td class="py-2">{{ $latestScore ? $latestScore->total : 'Belum ada nilai' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>