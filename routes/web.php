<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Kernel;
use App\Models\Pengumuman;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        if ($role === "Admin") {
            $view = session('view', 'dashboard');
            $data = [];
            
            if ($view === 'detail_quis') {
                $data['quiz'] = session('quiz');
                $data['soal'] = session('soal');
            } elseif ($view === 'list_kuis') {
                $data['quis'] = session('quis');
            }
            
            return view('admin.' . $view, $data);
        } elseif ($role === "Manager") {
            $ucount = User::count();
            return view('manager.dashboard', compact('ucount'));
        } else {
            $pengumuman = Pengumuman::orderBy('id')->first();
            $guru = User::findOrFail($pengumuman->id_guru);
            return view('user.dashboard', compact('pengumuman', 'guru'));
        }

    } else {
        return redirect('/login');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔒 Hanya Admin
Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {
    Route::get('/admin/materi', fn() => view('admin.dashboard'))->name('admin.materi');
    Route::get('/admin/proyek', fn() => view('admin.dashboard'))->name('admin.proyek');
    Route::get('/admin/monitor/proyek', [AdminController::class, 'MonitorProyekView'])->name('admin.monitor.proyek');
    Route::get('/admin/kelompok/kerja', fn() => view('admin.dashboard'))->name('admin.kelompok.kerja');
    Route::get('/admin/create/quis', fn() => view('admin.dashboard'))->name('admin.create.quis');
    Route::get('/admin/list/quis', [AdminController::class, 'ViewAllQuis'])->name('admin.list.quis');
    Route::get('/admin/detail/quis/{id}', [AdminController::class, 'ViewQuizDetail'])->name('admin.detail.quis');
    Route::get('/admin/edit/quis/{id}', [AdminController::class, 'EditQuizView'])->name('admin.edit.quis');
    Route::delete('/admin/delete/quis/{id}', [AdminController::class, 'DeleteQuiz'])->name('admin.delete.quis');
    Route::post('/admin/update/quis/{id}', [AdminController::class, 'UpdateQuiz'])->name('admin.update.quis');
    Route::post('/admin/tambah/soal', [AdminController::class, 'TambahSoal'])->name('admin.tambah.soal');
    Route::put('/admin/edit/soal/{id}', [AdminController::class, 'UpdateSoal'])->name('admin.edit.soal');
    Route::delete('/admin/hapus/soal/{id}', [AdminController::class, 'HapusSoal'])->name('admin.hapus.soal');
    Route::post('/admin/tambah/pengumuman', [AdminController::class, 'TambahPengumuman'])->name('admin.tambah.pengumuman');
    Route::post('/admin/tambah/materi', [AdminController::class, 'TambahMateri'])->name('admin.tambah.materi');
    Route::post('/admin/tambah/proyek', [AdminController::class, 'TambahProyek'])->name('admin.tambah.proyek');
    Route::post('/admin/tambah/kelompok/kerja', [AdminController::class, 'TambahPengumuman'])->name('admin.tambah.kelompok.kerja');
    Route::post('/admin/tambah/kuis', [AdminController::class, 'TambahQuis'])->name('admin.tambah.kuis');
    Route::get('/admin/ranking/kelompok/kerja', [AdminController::class, 'RankingKelompokKerjaView'])->name('admin.rangking.kelompok.kerja');
    Route::get('/admin/penilaian/evaluasi', fn() => view('admin.dashboard'))->name('admin.penilaian.evaluasi');
});

// 🔒 Hanya Manager
Route::middleware(['auth', 'verified', 'role:Manager'])->group(function () {
    Route::get('/manage/user', [ManagerController::class, 'GetAllUser'])->name('manage.user');
    Route::get('/manage/class', [ManagerController::class, 'GetAllClass'])->name('manage.class');
    Route::post('/manage/user/delete/{id}', [ManagerController::class, 'DeleteUser'])->name('delete.user');
    Route::post('/manage/user/create', [ManagerController::class, 'CreateNewUser'])->name('manager.create.user');
    Route::put('/manage/user/edit/{id}', [ManagerController::class, 'EditUserData'])->name('manage.edit.user');
});

Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/user/materi/view', [UserController::class, 'GetAllMateri']);
    Route::get('/user/materi/detail/{id}', [UserController::class, 'ViewDetailMateri'])->name('user.materi.detail');
    Route::post('/user/proyek/upload', [UserController::class, 'UploadProyekPenugasan'])->name('user.upload.kerja.proyek');
    Route::get('/user/proyek', [UserController::class, 'GetAllProject'])->name('user.proyek');
    Route::get('/user/proyek/kerja/{id}', [UserController::class, 'ViewKerjaProyek'])->name('user.proyek.kerja');
    Route::get('/user/kelompok', [UserController::class, 'ViewKelompoKerja'])->name('user.kelompok');
    Route::get('/user/penilaian', [UserController::class, 'ViewPenilaian'])->name('user.penilaian');
    Route::get('/user/kuis/kerja/{id}', [UserController::class, 'ViewQuisKerja'])->name('user.kuis.kerja');
    Route::post('/user/submit/quis/{id}', [UserController::class, 'SubmitQuis'])->name('user.submit.quis');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
