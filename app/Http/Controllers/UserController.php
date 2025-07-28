<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Penugasan;
use App\Models\Materi;
use App\Models\Proyek;
use App\Models\Quis;
use App\Models\NilaiQuis;
use App\Models\Soal;
use App\Models\Source;
use App\Models\Kelompok;
use App\Models\Evaluate;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function GetAllMateri() {
        $materi = Materi::all();
        return view('user.dashboard', compact('materi'));
    }

    public function ViewDetailMateri($id) {
        $materi = Materi::findOrFail($id);
        return view('user.dashboard', compact('materi'));
    }

    public function GetAllProject() {
        $proyek = Proyek::all();
        $penugasan = Penugasan::all();
        return view('user.dashboard', compact('proyek', 'penugasan'));
    }

    public function UploadProyekPenugasan(Request $request) {
        $request->validate([
            'proyek_id' => ['required'],
            'file' => ['required']
        ]);

        $file_id = null;

        if ($request->file != null) {
            $uploadedFile = $request->file;

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

        Penugasan::create([
            'id_user' => Auth::user()->id,
            'id_proyek' => $request->proyek_id,
            'id_file' => $file_id
        ]);

        return redirect('user/proyek')->with('success', 'Tugas berhasil dikumpulkan.');
    }

    public function ViewKerjaProyek($id) {
        $proyek = Proyek::findOrFail($id);
        $penugasan = Penugasan::where('id_proyek', $id);
        return view('user.dashboard', compact('proyek', 'penugasan'));
    }

    public function ViewKelompoKerja() {
        // Cari kelompok yang berisi user ini
        $kelompok = Kelompok::where('id_user_1', Auth::user()->id)
            ->orWhere('id_user_2', Auth::user()->id)
            ->orWhere('id_user_3', Auth::user()->id)
            ->orWhere('id_user_4', Auth::user()->id)
            ->orWhere('id_user_5', Auth::user()->id)
            ->with(['user1', 'user2', 'user3', 'user4', 'user5'])
            ->first();
        
        $quis = Quis::all();
        $nilai_quis = NilaiQuis::where('id_user', Auth::user()->id)->get();
        
        return view('user.dashboard', compact('kelompok', 'quis', 'nilai_quis'));
    }

    public function ViewPenilaian() {
        $nilaiQuis = NilaiQuis::where('id_user', Auth::user()->id)
            ->with(['quis', 'evaluate'])
            ->get();
        
        return view('user.dashboard', compact('nilaiQuis'));
    }

    public function ViewQuisKerja($id) {
        $quis = Quis::findOrFail($id);
        $soal = Soal::where('id_quis', $quis->id)->get();
        return view('user.dashboard', compact('quis', 'soal'));
    }

    public function SubmitQuis(Request $request, $id) {
        $answers = $request->input('soal');
        $totalSoal = count($answers);
        $jawabanBenar = 0;

        foreach ($answers as $soal_id => $jawaban_user) {
            $soal = Soal::find($soal_id);
            if ($soal && $soal->answer === $jawaban_user) {
                $jawabanBenar++;
            }
        }

        // Hitung nilai maksimal 100
        $nilai = 0;
        if ($totalSoal > 0) {
            $nilai = round(($jawabanBenar / $totalSoal) * 100);
        }

        // Simpan nilai ke database
        NilaiQuis::create([
            'id_quis' => $id,
            'id_user' => auth()->id(),
            'total' => $nilai,
        ]);

        return redirect()->route('user.kelompok')->with('success', 'Jawaban berhasil dikumpulkan! Nilai Anda: ' . $nilai);
    }
}
