<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public function campaign()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_registers');
    }

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
        return $this->belongsToMany(User::class, 'comments_campaign_registers')->withPivot('description', 'created_at')->orderBy('comments_campaign_registers.created_at', 'DESC');
    }
}
