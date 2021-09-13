<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable=['name','second_name','login','password','api_token'];
    public $timestamps=false;
}
