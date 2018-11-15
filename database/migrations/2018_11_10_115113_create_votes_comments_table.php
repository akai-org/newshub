<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes_comments', function (Blueprint $table) {
            $table->increments('vote_id')->index();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedInteger('comment_id');
            $table->foreign('comment_id')->references('comment_id')->on('comments')->onDelete('cascade');
            $table->enum('type', ['plus', 'minus']);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('votes_comments')->insert(
            array(
                'comment_id' => App\Comment::first()->post_id,
                'user_id' => App\User::first()->user_id,
                'type' => 'plus',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes_comments');
    }
}
