<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Quis;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    protected $fillable = [
        'id_quis',
        'soal',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
    ];

    /**
     * Relasi ke model User atau Guru
     * Misal guru disimpan di tabel users
     */
    public function quis()
    {
        return $this->belongsTo(Quis::class, 'id_quis');
    }
}