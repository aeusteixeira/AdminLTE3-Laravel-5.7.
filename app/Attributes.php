<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
