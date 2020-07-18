<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignRegister extends Model
{
    protected $fillable = [
        'campaign_id',
        'register_id'
    ];
    protected $table = 'campaign_registers';
}
