<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Materi;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Carbon;

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
}
