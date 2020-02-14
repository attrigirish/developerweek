<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table='likes';
    protected $fillable=['reply_id','like'];
}
