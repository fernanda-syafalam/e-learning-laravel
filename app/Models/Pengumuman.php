<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'tanggal_dibuat',
        'id_guru',
        'pesan',
    ];

    /**
     * Relasi ke model User atau Guru
     * Misal guru disimpan di tabel users
     */
    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru');
    }
}
