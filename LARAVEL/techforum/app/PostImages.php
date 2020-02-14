<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    protected $table='postimages';
    protected $fillable=['post_id','url'];
}
