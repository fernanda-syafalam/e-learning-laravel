<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Quis;

class NilaiQuis extends Model
{
    protected $table = 'nilai_quis';

    protected $fillable = [
        'id_user',
        'id_quis',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function quis()
    {
        return $this->belongsTo(Quis::class, 'id_quis');
    }
}
