<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['classroom_id', 'user_id'];

    public function classroom()
    {
        return $this->belongsTo(CLassroom::class, 'classroom_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
