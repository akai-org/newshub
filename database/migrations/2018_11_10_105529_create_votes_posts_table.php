<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes_posts', function (Blueprint $table) {
            $table->increments('vote_id')->index();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedInteger('post_id');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
            $table->enum('type', ['plus', 'minus']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        // DB::table('votes_posts')->insert(
        //     array(
        //         'post_id' => App\Post::first()->post_id,
        //         'user_id' => App\User::first()->user_id,
        //         'type' => 'plus',
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
        Schema::dropIfExists('votes');
    }
}
