<div class="w-full p-16 overflow-y-auto">

    <div class="w-full flex mb-6">
        <a href="{{ route('admin.list.quis') }}" class="cursor-pointer border-b text-blue-500 font-medium">< Kembali</a>
    </div>
    
    @if (isset($quis))
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 space-y-4">
            <h2 class="text-3xl font-bold text-blue-800 border-b pb-3">📘 Detail Kuis</h2>

            <div class="text-lg text-gray-700 space-y-2">
                <p><strong>📖 Judul:</strong> {{ $quis->judul }}</p>
                <p><strong>🗓️ Tanggal Dibuat:</strong> {{ $quis->created_at->format('d M Y H:i') }}</p>
                <p><strong>🔄 Terakhir Update:</strong> {{ $quis->updated_at->format('d M Y H:i') }}</p>
                <p><strong>⏰ Deadline:</strong> {{ $quis->deadline }}</p>
                <p><strong>🕒 Waktu Pengerjaan:</strong> {{ $quis->waktu_pengerjaan }} Jam/Menit</p>
                <p><strong>❓ Total Soal:</strong> {{ $quis->total_soal }}</p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold text-gray-800">📄 Semua Soal - {{ $soal->count() }}</h2>
            @if ($quis->total_soal <= $soal->count())
                <button type="button" class="bg-gray-600 text-white px-4 py-2 rounded-md"">+ Tambah Soal</button>
            @else 
                <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md" onclick="show_modal_tambah_soal()">+ Tambah Soal</button>
            @endif
        </div>

        @if ($soal->count() > 0)
            <div class="max-w-4xl mx-auto mt-4 space-y-4">
                @php $counter_question = 1; @endphp
                @foreach ($soal as $quest)
                    <div class="bg-white shadow-sm p-4 rounded-lg border border-gray-200">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-gray-800">Soal {{ $counter_question++ }}</h3>
                            <div class="space-x-2">
                                <button type="button" class="text-blue-600 hover:underline text-sm" onclick='showEditModal(@json($quest))'>Edit</button>
                                <button type="button" class="text-red-600 hover:underline text-sm" onclick="showDeleteModal({{ $quest->id }})">Hapus</button>   
                            </div>
                        </div>
                        <p class="mb-3 text-gray-700">{{ $quest->soal }}</p>
                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                            <li><strong>A.</strong> {{ $quest->option_a }}</li>
                            <li><strong>B.</strong> {{ $quest->option_b }}</li>
                            <li><strong>C.</strong> {{ $quest->option_c }}</li>
                            <li><strong>D.</strong> {{ $quest->option_d }}</li>
                        </ul>
                        <p class="mt-2 text-sm text-green-700"><strong>Jawaban Benar:</strong> Option {{ $quest->answer }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="max-w-4xl mx-auto mt-4 text-center text-gray-500">Belum ada soal yang ditambahkan.</p>
        @endif
    @endif

    <div class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden" id="modal_tambah_soal">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-xl font-semibold text-gray-800">Tambah Soal</h2>
                <button type="button" class="text-gray-600 cursor-pointer hover:text-red-500 text-lg font-bold" onclick="close_modal_tambah_soal()">×</button>
            </div>

            <form method="post" action="{{ route('admin.tambah.soal') }}" class="mt-4 space-y-4">
                @csrf
                <input type="hidden" name="id_quis" value="{{ $quis->id }}" />

                <div>
                    <label for="soal" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" name="soal" id="soal" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-gray-200" required />
                </div>

                @foreach (['A', 'B', 'C', 'D'] as $opt)
                    <div>
                        <label for="option_{{ strtolower($opt) }}" class="block text-sm font-medium text-gray-700">Opsi {{ $opt }}</label>
                        <input type="text" name="option_{{ strtolower($opt) }}" id="option_{{ strtolower($opt) }}" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-gray-200" required />
                    </div>
                @endforeach

                <div>
                    <label for="correct_answer" class="block text-sm font-medium text-gray-700">Jawaban Benar</label>
                    <select name="answer" id="correct_answer" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-gray-200" required>
                        <option value="">Pilih jawaban yang benar</option>
                        <option value="A">Opsi A</option>
                        <option value="B">Opsi B</option>
                        <option value="C">Opsi C</option>
                        <option value="D">Opsi D</option>
                    </select>
                </div>

                <div class="flex justify-end pt-3">
                    <button type="submit" class="px-4 py-2 cursor-pointer bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded shadow">
                        Simpan Soal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Soal -->
    <div class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center" id="modal_konfirmasi_hapus">
        <div class="bg-white w-full max-w-sm p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus Soal</h2>
            <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menghapus soal ini?</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Soal -->
    <div class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden" id="modal_edit_soal">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-xl font-semibold text-gray-800">Edit Soal</h2>
                <button type="button" class="text-gray-600 cursor-pointer hover:text-red-500 text-lg font-bold" onclick="closeEditModal()">×</button>
            </div>

            <form method="POST" id="editForm" class="mt-4 space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_quis" value="{{ $quis->id }}" />

                <div>
                    <label for="edit_soal" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" name="soal" id="edit_soal" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-gray-200" required />
                </div>

                @foreach (['A', 'B', 'C', 'D'] as $opt)
                    <div>
                        <label for="edit_option_{{ strtolower($opt) }}" class="block text-sm font-medium text-gray-700">Opsi {{ $opt }}</label>
                        <input type="text" name="option_{{ strtolower($opt) }}" id="edit_option_{{ strtolower($opt) }}" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-gray-200" required />
                    </div>
                @endforeach

                <div>
                    <label for="edit_answer" class="block text-sm font-medium text-gray-700">Jawaban Benar</label>
                    <select name="answer" id="edit_answer" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-gray-200" required>
                        <option value="">Pilih jawaban yang benar</option>
                        <option value="A">Opsi A</option>
                        <option value="B">Opsi B</option>
                        <option value="C">Opsi C</option>
                        <option value="D">Opsi D</option>
                    </select>
                </div>

                <div class="flex justify-end pt-3">
                    <button type="submit" class="px-4 py-2 cursor-pointer bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded shadow">
                        Update Soal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function show_modal_tambah_soal() {
            document.getElementById('modal_tambah_soal').classList.remove('hidden');
        }

        function close_modal_tambah_soal() {
            document.getElementById('modal_tambah_soal').classList.add('hidden');
        }

        function showDeleteModal(id) {
            const modal = document.getElementById('modal_konfirmasi_hapus');
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('admin.hapus.soal', ['id' => '__id__']) }}".replace('__id__', id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('modal_konfirmasi_hapus');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function showEditModal(soal) {
            const modal = document.getElementById('modal_edit_soal');
            const form = document.getElementById('editForm');

            // Set nilai form
            form.action = `/admin/edit/soal/${soal.id}`;
            document.getElementById('edit_soal').value = soal.soal;
            document.getElementById('edit_option_a').value = soal.option_a;
            document.getElementById('edit_option_b').value = soal.option_b;
            document.getElementById('edit_option_c').value = soal.option_c;
            document.getElementById('edit_option_d').value = soal.option_d;
            document.getElementById('edit_answer').value = soal.answer;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            const modal = document.getElementById('modal_edit_soal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</div>