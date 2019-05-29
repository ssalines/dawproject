<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function message(){
        return $this->message_retrive()->union($this->message_send()->toBase());
    }

    public function message_send(){
        return $this->HasMany(Message::class, 'user_id');
    }

    public function message_retrive(){
        return $this->HasMany(Message::class, 'to_id');
    }

    public function participant(){
        return $this->HasMany(Participant::class);
    }

    public function operation(){
        return $this->HasMany(Operation::class);
    }

    public function classroom(){
        return $this->HasMany(Classroom::class);
    }

    public function student(){
        return $this->HasMany(Student::class);
    }
}
