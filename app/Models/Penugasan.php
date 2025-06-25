<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Proyek;
use App\Models\Source;

class Penugasan extends Model
{
    use HasFactory;

    protected $table = 'penugasan';

    protected $fillable = [
        'id_proyek',
        'id_user',
        'id_file',
    ];

    /**
     * Relasi ke model User atau Guru
     * Misal guru disimpan di tabel users
     */
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    public function file() {
        return $this->belongsTo(Source::class, 'id_file');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
