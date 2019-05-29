<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['to_id', 'user_id', 'step_id','file_id', 'message', 'affair'];

    public function users(){

        return $this->belongsTo(User::class);

    }

    public function steps(){

        return $this->belongsTo(Step::class, 'step_id');

    }

    public function operations()
    {
        return $this->hasManyThrough(

            Message::class,
            Step::class,
            'operation_id',
            'step_id',
            'id',
            'id'
        );
    }

    public function file(){

        return $this->belongsTo(File::class);

    }
}
