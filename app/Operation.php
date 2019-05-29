<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
        protected $fillable = ['title', 'user_id', 'operation_type', 'exp_name','exp_country', 'imp_name', 'imp_country', 'role', 'item', 'currency', 'price', 'transport', 'incoterm', 'payment', 'insurance_carrier', 'legislation', 'documents', 'language', 'contract'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function step(){
        return $this->HasMany(Step::class);
    }

    public function messages(){
        return $this->hasManyThrough(Message::class, Step::class);
    }

    public function participant(){
        return $this->HasMany(Participant::class);
    }

}
