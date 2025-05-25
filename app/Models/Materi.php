<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'tanggal_dibuat',
        'id_guru',
        'judul',
        'deskripsi',
    ];

    // Relasi ke guru (user)
    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru');
    }
}
