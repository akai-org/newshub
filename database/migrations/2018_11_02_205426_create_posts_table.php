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
            $table->increments('post_id')->index();
            $table->string('title');
            $table->text('description');
            $table->text('url');
            $table->text('image');
            $table->boolean('is_adult')->default(false);
            $table->boolean('is_visable')->default(true);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->text('slug');
            $table->timestamps();
        });

        // Insert some stuff
        // DB::table('posts')->insert(
        //     array(
        //         'title' => 'Window 10 Update Brings Zoom In Feature To Console In Latest Insider Build',
        //         'description' => 'Windows console feature that Microsoft users have been requesting for a long time – zooming in support to the Windows Power Shell and Windows Prompt has been added by Microsoft',
        //         'url' => 'https://fossbytes.com/windows-10-update-brings-zoom-in-feature-to-console-in-latest-insider-build',
        //         'image' => 'https://fossbytes.com/wp-content/uploads/2018/11/Windows-PowerShell-Zoom-In-Feature-640x360.jpg',
        //         'user_id' => App\User::first()->user_id
        //     )
        // );

        // DB::table('posts')->insert(
        //     array(
        //         'title' => 'Linux Kernel 4.19 LTS Release is Here!',
        //         'description' => 'If you’ve been waiting for a stable (and longterm) Kernel release now, Kernel 4.19 is here.',
        //         'url' => 'https://itsfoss.com/linux-kernel-4-19-lts-release/',
        //         'image' => 'https://4bds6hergc-flywheel.netdna-ssl.com/wp-content/uploads/2018/10/kernel-4-19-release-300x169.jpeg',
        //         'user_id' => App\User::first()->user_id
        //     )
        // );

        // DB::table('posts')->insert(
        //     array(
        //         'title' => 'Ubuntu 19.04 Release Date & Planned Features',
        //         'description' => 'This date appears on the draft release schedule for Ubuntu 19.04 (named the ‘Disco Dingo’), which was recently added to the official Ubuntu Wiki.',
        //         'url' => 'https://www.omgubuntu.co.uk/2018/11/ubuntu-19-04-release-features',
        //         'image' => 'https://www.omgubuntu.co.uk/wp-content/uploads/2018/10/ubuntu-disco-dingo-350x200.jpg',
        //         'user_id' => App\User::first()->user_id
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
        Schema::dropIfExists('posts');
    }
}
