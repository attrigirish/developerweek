<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $fillable=['name','display_name','email','phone','password','photo','user_type'];
}
