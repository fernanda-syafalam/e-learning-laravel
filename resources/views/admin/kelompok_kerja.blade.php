<div class="w-full p-8 md:p-16 overflow-y-auto bg-gray-50 min-h-screen">

    <!-- Header -->
    <div class="w-full flex flex-wrap justify-between items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold text-gray-800">Kelompok Kerja</h1>
        <div class="flex flex-wrap gap-2">
            <form action="{{ route('admin.buat.kelompok.otomatis') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-4 py-2 rounded-md bg-blue-500 text-white font-medium hover:bg-blue-600 transition">
                    Buat Kelompok Otomatis
                </button>
            </form>
            <a href="{{ route('admin.create.quis') }}" class="px-4 py-2 rounded-md bg-blue-500 text-white font-medium hover:bg-blue-600 transition">
                Buat Quiz
            </a>
            <a href="{{ route('admin.list.quis') }}" class="px-4 py-2 rounded-md bg-blue-500 text-white font-medium hover:bg-blue-600 transition">
                Lihat Kuis
            </a>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Daftar Kelompok -->
    @if($kelompok->count() > 0)
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Daftar Kelompok</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kelompok as $index => $group)
                <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold mb-3 text-gray-800">Kelompok {{ $index + 1 }}</h3>
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
                    <div class="mt-3 text-sm text-gray-500">
                        Total: {{ count($group->members) }} anggota
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-10 bg-white border border-gray-200 rounded-lg shadow-sm">
            <p class="text-gray-500 mb-3">Belum ada kelompok yang dibuat</p>
            <p class="text-sm text-gray-400">Klik tombol "Buat Kelompok Otomatis" untuk membuat kelompok berdasarkan nilai quiz terakhir</p>
        </div>
    @endif

    <!-- Daftar Siswa -->
    @if($users->count() > 0)
        <div class="mt-10">
            <h3 class="text-2xl font-semibold mb-4 text-gray-800">Daftar Siswa</h3>
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-300">
                            <th class="text-left py-3 px-4 font-medium text-gray-700">Nama</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-700">Email</th>
                            <th class="text-left py-3 px-4 font-medium text-gray-700">Nilai Quiz Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @php
                                $latestScore = \App\Models\NilaiQuis::where('id_user', $user->id)
                                    ->orderBy('created_at', 'desc')
                                    ->first();
                            @endphp
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                <td class="py-3 px-4">{{ $user->name }}</td>
                                <td class="py-3 px-4">{{ $user->email }}</td>
                                <td class="py-3 px-4">{{ $latestScore ? $latestScore->total : 'Belum ada nilai' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
