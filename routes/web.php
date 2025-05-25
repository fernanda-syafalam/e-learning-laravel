<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        if ($role === "Admin") {
            return view('admin.dashboard');
        } elseif ($role === "Manager") {
            $ucount = User::count();
            return view('manager.dashboard', compact('ucount'));
        } else {
            return view('user.dashboard');
        }

    } else {
        return redirect('/login');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/manage/user', [ManagerController::class, 'GetAllUser'])->middleware(['auth', 'verified'])->name('manage.user');
Route::get('/manage/class', [ManagerController::class, 'GetAllClass'])->middleware(['auth', 'verified'])->name('manage.class');
Route::post('/manage/user/delete/{id}', [ManagerController::class, 'DeleteUser'])->middleware(['auth', 'verified'])->name('delete.user');
Route::post('/manage/user/create', [ManagerController::class, 'CreateNewUser'])->middleware(['auth', 'verified'])->name('manager.create.user');
Route::put('/manage/user/edit/{id}', [ManagerController::class, 'EditUserData'])
    ->middleware(['auth', 'verified'])
    ->name('manage.edit.user');

Route::get('/admin/materi', function() {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.materi');

Route::get('/admin/proyek', function() {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.proyek');

Route::get('/admin/kelompok/kerja', function() {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.kelompok.kerja');

Route::get('/admin/penilaian/evaluasi', function() {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.penilaian.evaluasi');

Route::post('/admin/tambah/pengumuman', [AdminController::class, 'TambahPengumuman'])->middleware(['auth', 'verified'])->name('admin.tambah.pengumuman');
Route::post('/admin/tambah/materi', [AdminController::class, 'TambahMateri'])->middleware(['auth', 'verified'])->name('admin.tambah.materi');
Route::post('/admin/tambah/proyek', [AdminController::class, 'TambahPengumuman'])->middleware(['auth', 'verified'])->name('admin.tambah.proyek');
Route::post('/admin/tambah/kelompok/kerja', [AdminController::class, 'TambahPengumuman'])->middleware(['auth', 'verified'])->name('admin.tambah.kelompok.kerja');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
