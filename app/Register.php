<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'unit_id',
        'city',
        'courses',
        'slot',
        'view',
        'created_at',
    ];
    public function campaign()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_registers');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments_campaign_registers')->withPivot('description', 'created_at')->orderBy('comments_campaign_registers.created_at', 'DESC');
    }
}
