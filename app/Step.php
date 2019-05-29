<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

    protected $fillable = ['operation_id', 'name'];

    public function messages(){

        return $this->HasMany(Message::class);

    }

    public function operations(){

        return $this->belongsTo(Operation::class);

    }
}
