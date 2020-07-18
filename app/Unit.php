<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function registers()
    {
        return $this->hasMany(Register::class, 'unit_id', 'id');
    }
}
