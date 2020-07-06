<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPUnit\Framework\Constraint\Attribute;

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

    public function comments()
    {
        return $this->belongsToMany(Register::class, 'comments_campaign_registers')->withPivot('description', 'created_at')->orderBy('comments_campaign_registers.created_at', 'DESC');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function attribute()
    {
        return $this->hasOne(Attributes::class);
    }

}
