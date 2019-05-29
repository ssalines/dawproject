<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable = ['operation_id', 'role_id', 'user_id'];

    public function role(){

        return $this->belongsTo(Role::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function operation(){

        return $this->belongsTo(Operation::class);

    }
}
