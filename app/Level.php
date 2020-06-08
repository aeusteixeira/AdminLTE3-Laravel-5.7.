<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name',
        'description',

        // User
        'create_user',
        'update_user',
        'delete_user',

        //Register
        'create_register',
        'update_register',
        'delete_register',

        //Level
        'create_level',
        'update_level',
        'delete_level',

        //Unit
        'create_unit',
        'update_unit',
        'delete_unit',

        //Layouts
        'create_layout',
        'update_layout',
        'delete_layout',

        //Campaign
        'create_campaign',
        'update_campaign',
        'delete_campaign',

        //Email
        'create_email',
        'delete_email',

        //Post
        'create_post',
        'update_post',
        'delete_post',

        //Messages
        'create_message',
        'update_message',
        'delete_message',

        //Spreadsheet
        'spreadsheet_generate',
        'spreadsheet_import',

        //PrintScreen and Printer
        'print_screen',
        'printer',

        //Administrator
        'administrator',
    ];

    public function setAdministratorAttribute($value){
        $this->attributes['administrator'] = $value;

        // User
        $this->attributes['create_user'] = $value;
        $this->attributes['update_user'] = $value;
        $this->attributes['delete_user'] = $value;

        //Register
        $this->attributes['create_register'] = $value;
        $this->attributes['update_register'] = $value;
        $this->attributes['delete_register'] = $value;

        //Level
        $this->attributes['create_level'] = $value;
        $this->attributes['update_level'] = $value;
        $this->attributes['delete_level'] = $value;

        //Unit
        $this->attributes['create_unit'] = $value;
        $this->attributes['update_unit'] = $value;
        $this->attributes['delete_unit'] = $value;

        //Layouts
        $this->attributes['create_layout'] = $value;
        $this->attributes['update_layout'] = $value;
        $this->attributes['delete_layout'] = $value;

        //Campaign
        $this->attributes['create_campaign'] = $value;
        $this->attributes['update_campaign'] = $value;
        $this->attributes['delete_campaign'] = $value;

        //Email
        $this->attributes['create_email'] = $value;
        $this->attributes['delete_email'] = $value;

        //Post
        $this->attributes['create_post'] = $value;
        $this->attributes['update_post'] = $value;
        $this->attributes['delete_post'] = $value;

        //Messages
        $this->attributes['create_message'] = $value;
        $this->attributes['update_message'] = $value;
        $this->attributes['delete_message'] = $value;

        //Spreadsheet
        $this->attributes['spreadsheet_generate'] = $value;
        $this->attributes['spreadsheet_import'] = $value;

        //PrintScreen and Printer
        $this->attributes['print_screen'] = $value;
        $this->attributes['printer'] = $value;
        }
    }
