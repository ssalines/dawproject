<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name', 'user_id'];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function student()
        {
            return $this->hasMany(Student::class);
        }

}
