<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSchema extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->BigIncrements('user_id');
            $table->string('name');
            $table->string('display_name');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->string('photo');
            $table->integer('user_type');
            $table->timestamps();
        });

        Schema::create('topic', function (Blueprint $table) {
            $table->BigIncrements('topic_id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('post', function (Blueprint $table) {
            $table->BigIncrements('post_id');
            $table->integer('user_id');
            $table->integer('topic_id');
            $table->string('title');
            $table->string('body');
            $table->string('date');
            $table->string('isflagged');
            $table->timestamps();                     
        });

        Schema::create('postimages', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('post_id');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('replies', function (Blueprint $table) {
            $table->BigIncrements('reply_id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->string('date');
            $table->string('isspam');
            $table->timestamps();
        });

        Schema::create('views', function (Blueprint $table) {
            $table->BigIncrements('view_id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->BigIncrements('like_id');
            $table->integer('reply_id');
            $table->integer('like');
            $table->timestamps();
        });

    }

    public function down()
    {
        //
    }
}
