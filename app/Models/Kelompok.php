<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompok';
    protected $fillable = [
        'id_user_1',
        'id_user_2', 
        'id_user_3',
        'id_user_4',
        'id_user_5'
    ];

    public function user1()
    {
        return $this->belongsTo(User::class, 'id_user_1');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'id_user_2');
    }

    public function user3()
    {
        return $this->belongsTo(User::class, 'id_user_3');
    }

    public function user4()
    {
        return $this->belongsTo(User::class, 'id_user_4');
    }

    public function user5()
    {
        return $this->belongsTo(User::class, 'id_user_5');
    }

    public function getMembersAttribute()
    {
        $members = [];
        if ($this->id_user_1) $members[] = $this->user1;
        if ($this->id_user_2) $members[] = $this->user2;
        if ($this->id_user_3) $members[] = $this->user3;
        if ($this->id_user_4) $members[] = $this->user4;
        if ($this->id_user_5) $members[] = $this->user5;
        return $members;
    }
} 