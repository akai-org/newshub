<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id')->index();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedInteger('post_id');
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->unsignedInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('comment_id')->on('comments');
            $table->string('content');
            $table->boolean('is_adult')->default(false);
            $table->boolean('is_visable')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // DB::table('comments')->insert(
        //     array(
        //         'content' => 'Eius maxime deleniti iure facere quidem et. Saepe saepe et repellat dolor nulla aut et. Atque iste dolor sequi reiciendis maxime vel in. Soluta beatae porro quia. Dolores animi quam fuga qui. ',
        //         'user_id' => App\User::first()->user_id,
        //         'post_id' => App\Post::first()->post_id
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
