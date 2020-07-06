<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = [
        'name',
        'name_input',
        'email_input',
        'telephone_input',
        'courses_input',
        'unit_input',
        'city_input',
        'district_input',
        'courses_input',
    ];
}
