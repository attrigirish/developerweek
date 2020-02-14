<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    protected $table='views';
    protected $fillable=['post_id','user_id'];
}
