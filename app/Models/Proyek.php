<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;
use App\Models\Source;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';

    protected $fillable = [
        'id_guru',
        'judul',
        'deskripsi',
        'id_file',
        'deadline',
    ];

    /**
     * Relasi ke model User atau Guru
     * Misal guru disimpan di tabel users
     */
    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru');
    }

    public function file()
    {
        return $this->belongsTo(Source::class, 'id_file');
    }
}
