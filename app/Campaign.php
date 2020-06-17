<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name_private',
        'description_private',
        'name_public',
        'information_public',
        'slug',
        'default_whatsapp_message',
        'default_email_message',
        'layout_id',
        'template_id',
        'redirect',
        'redirectTo',
        'status'
    ];

    public function setName_publicAttribute($value){
        $this->attributes['name_public'] = $value;
        $this->attributes['slug'] = str_slug($value, '-');
    }

    public function register(){
        return $this->belongsToMany(Register::class, 'campaign_registers');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
