<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('postid')->index();
            $table->string('name');
            $table->string('description');
            $table->text('url');
            $table->text('image');
            $table->boolean('is_adult')->default(false);
            $table->boolean('is_visable')->default(true);
            $table->unsignedInteger('userid');
            $table->foreign('userid')->references('userid')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
