<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Materi;
use App\Models\Proyek;
use App\Models\Quis;
use App\Models\Soal;
use App\Models\Source;
use App\Models\Kelompok;
use App\Models\NilaiQuis;
use App\Models\Evaluate;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function TambahPengumuman(Request $request) {
        $request->validate([
            'teachid' => ['required'],
            'pesan' => ['required', 'string'],
        ]);

        Pengumuman::create([
            'id_guru' => $request->teachid,
            'pesan' => $request->pesan,
            'tanggal_dibuat' => Carbon::now(),
        ]);

        return redirect()->back()->with('add-announcement-success', 'Pengumuman berhasil dikirim.');
    }

    public function TambahMateri(Request $request) {
        $request->validate([
            'teachid' => ['required'],
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
        ]);

        Materi::create([
            'id_guru' => $request->teachid,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_dibuat' => Carbon::now(),
        ]);

        return redirect()->back()->with('add-materi-success', 'Materi berhasil disimpan.');
    }

    public function RankingKelompokKerjaView() 
    {
        // $request->validate(

        // );

        return view('admin.dashboard');
    }

    public function MonitorProyekView() {
        $projects = Proyek::all();
        
        return view('admin.dashboard', compact('projects'));
    }

    public function TambahProyek(Request $request) {
        $request->validate([
            'teachid' => ['required'],
            'judul' => ['required', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'deadline' => ['required', 'date'],
            'file' => ['nullable', 'file'], 
        ]);

        $file_id = null;

        if ($request->file != null) {
            $uploadedFile = $request->file('file');

            $filename = $uploadedFile->getClientOriginalName(); 
            $format = $uploadedFile->getClientOriginalExtension(); 
            $binaryContent = file_get_contents($uploadedFile->getRealPath());

            $source = Source::create([
                'filename' => $filename,
                'format' => $format,
                'filler' => $binaryContent,
            ]);

            $file_id = $source->id; 
        }

        Proyek::create([
            'id_guru' => $request->teachid,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'id_file' => $file_id
        ]);

        return redirect('admin/proyek')->with(['success', 'Proyek berhasil disimpan']);
    }

    public function TambahQuis(Request $request) {
        $request->validate([
            'judul' => ['required', 'string'],
            'total_soal' => ['required'],
            'waktu_pengerjaan' => ['required'],
            'deadline' => ['required'],
        ]);

        $quis = Quis::create([
            'judul' => $request->judul,
            'total_soal' => $request->total_soal,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
            'deadline' => $request->deadline
        ]);

        return redirect()->route('admin.detail.quis', ['id' => $quis->id]);
    }

    public function ViewQuizDetail($id) {
        $quis = Quis::findOrFail($id);
        $soal = Soal::where('id_quis', $id)->get();
        return view('admin.dashboard', compact('quis', 'soal'));
    }

    public function ViewAllQuis() {
        $quis = Quis::all();
        return view('admin.dashboard')->with(['quis' => $quis, 'view' => 'list_kuis']);
    }

    public function EditQuizView($id) {
        $quiz = Quis::findOrFail($id);
        return view('admin.dashboard', compact('quiz'));
    }

    public function DeleteQuiz($id) {
        $quiz = Quis::findOrFail($id);
        Soal::where('id_quis', $id)->delete();
        $quiz->delete();
        return redirect()->route('admin.list.quis')->with('success', 'Kuis berhasil dihapus');
    }

    public function UpdateQuiz(Request $request, $id) {
        $request->validate([
            'judul' => ['required', 'string'],
            'total_soal' => ['required', 'integer'],
            'waktu_pengerjaan' => ['required'],
            'deadline' => ['required', 'date'],
        ]);

        $quiz = Quis::findOrFail($id);
        $quiz->update($request->all());
        return redirect()->route('admin.list.quis')->with('success', 'Kuis berhasil diperbarui');
    }

    public function TambahSoal(Request $request) {
        $request->validate([
            'id_quis' => ['required'],
            'soal' => ['required', 'string'],
            'option_a' => ['required', 'string'],
            'option_b' => ['required', 'string'],
            'option_c' => ['required', 'string'],
            'option_d' => ['required', 'string'],
            'answer' => ['required', 'string'],
        ]);

        Soal::create($request->all());
        return redirect()->route('admin.detail.quis', $request->id_quis)->with('success', 'Soal berhasil ditambahkan');
    }

    public function UpdateSoal(Request $request) {
        $request->validate([
            'id' => ['required', 'exists:soals,id'],
            'soal' => ['required', 'string'],
            'option_a' => ['required', 'string'],
            'option_b' => ['required', 'string'],
            'option_c' => ['required', 'string'],
            'option_d' => ['required', 'string'],
            'answer' => ['required', 'in:A,B,C,D'],
        ]);

        $soal = Soal::find($request->id);
        $soal->update([
            'soal' => $request->soal,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
        ]);

        return redirect()->back()->with('success', 'Soal berhasil diperbarui.');
    }

    public function HapusSoal($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->back()->with('success', 'Soal berhasil dihapus.');
    }

    // Kerja Kelompok
    public function KelompokKerjaView()
    {
        $kelompok = Kelompok::with(['user1', 'user2', 'user3', 'user4', 'user5'])->get();
        $users = User::where('role', 'user')->get();
        
        return view('admin.dashboard', compact('kelompok', 'users'));
    }

    public function BuatKelompokOtomatis()
    {
        // Hapus kelompok yang ada
        Kelompok::truncate();
        
        // Ambil semua siswa
        $students = User::where('role', 'user')->get();
        
        // Ambil nilai quiz terakhir untuk setiap siswa
        $studentScores = [];
        foreach ($students as $student) {
            $latestScore = NilaiQuis::where('id_user', $student->id)
                ->orderBy('created_at', 'desc')
                ->first();
            
            $studentScores[] = [
                'user' => $student,
                'score' => $latestScore ? $latestScore->total : 0
            ];
        }
        
        // Urutkan berdasarkan nilai (descending)
        usort($studentScores, function($a, $b) {
            return $b['score'] - $a['score'];
        });
        
        // Bagi menjadi kelompok (minimal 2 orang per kelompok)
        $groups = [];
        $groupSize = max(2, ceil(count($studentScores) / 5)); // Maksimal 5 kelompok
        
        for ($i = 0; $i < count($studentScores); $i += $groupSize) {
            $group = array_slice($studentScores, $i, $groupSize);
            $groups[] = $group;
        }
        
        // Buat kelompok di database
        foreach ($groups as $group) {
            $kelompok = new Kelompok();
            
            if (isset($group[0])) $kelompok->id_user_1 = $group[0]['user']->id;
            if (isset($group[1])) $kelompok->id_user_2 = $group[1]['user']->id;
            if (isset($group[2])) $kelompok->id_user_3 = $group[2]['user']->id;
            if (isset($group[3])) $kelompok->id_user_4 = $group[3]['user']->id;
            if (isset($group[4])) $kelompok->id_user_5 = $group[4]['user']->id;
            
            $kelompok->save();
        }
        
        return redirect()->route('admin.kelompok.kerja')->with('success', 'Kelompok berhasil dibuat secara otomatis!');
    }

    // Penilaian dan Evaluasi
    public function PenilaianEvaluasiView()
    {
        $nilaiQuis = NilaiQuis::with(['user', 'quis', 'evaluate'])->get();
        
        return view('admin.dashboard', compact('nilaiQuis'));
    }

    public function SimpanEvaluasi(Request $request)
    {
        $request->validate([
            'id_nilai' => 'required|exists:nilai_quis,id',
            'message' => 'required|string'
        ]);

        // Hapus evaluasi yang ada jika ada
        Evaluate::where('id_nilai', $request->id_nilai)->delete();
        
        // Buat evaluasi baru
        Evaluate::create([
            'id_nilai' => $request->id_nilai,
            'message' => $request->message
        ]);

        return redirect()->route('admin.penilaian.evaluasi')->with('success', 'Evaluasi berhasil disimpan!');
    }

}
