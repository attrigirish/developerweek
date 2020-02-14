<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Indexes extends Migration
{
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('topic_id')->references('topic_id')->on('topic');
        });

        Schema::table('postimages', function (Blueprint $table) {
            $table->foreign('post_id')->references('post_id')->on('post');
        });

        Schema::table('replies', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('post_id')->references('post_id')->on('post');
        });

        Schema::table('views', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('post_id')->references('post_id')->on('post');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('reply_id')->references('reply_id')->on('replies');
        });

    }

    public function down()
    {
        //
    }
}
