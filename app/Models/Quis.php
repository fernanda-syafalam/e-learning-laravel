<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;
use App\Models\Source;

class Quis extends Model
{
    use HasFactory;

    protected $table = 'quis';

    protected $fillable = [
        'judul',
        'total_soal',
        'waktu_pengerjaan',
        'deadline',
    ];
}
