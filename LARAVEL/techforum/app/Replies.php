<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    protected $table='replies';
    protected $fillable=['user_id','post_id','date','isspam'];
}
