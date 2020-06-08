<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'CPF',
        'telephone',
        'email',
        'password',
        'email',
        'level_id',
        'unit_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function getCreatedFmAttribute(){
        return date('m/Y', strtotime($this->created_at));
    }
}
