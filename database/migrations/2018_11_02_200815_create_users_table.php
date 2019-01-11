<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->index();
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('image')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('firstname',50)->nullable();
            $table->string('lastname',50)->nullable();
            $table->boolean('is_locked')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('description', 100)->nullable();
        });

         // Insert some stuff
        //  DB::table('users')->insert(
        //     array(
        //         'username' => 'admin',
        //         'email' => 'admin@admin.pl',
        //         'image' => 'https://kooledge.com/assets/default_medium_avatar-57d58da4fc778fbd688dcbc4cbc47e14ac79839a9801187e42a796cbd6569847.png',
        //         'password' => Hash::make('qwerty123'),
        //     )
        // );
        App\User::create([
            'username' => 'admin',
            'email' => 'admin@admin.pl',
            'image' => 'https://kooledge.com/assets/default_medium_avatar-57d58da4fc778fbd688dcbc4cbc47e14ac79839a9801187e42a796cbd6569847.png',
            'password' => Hash::make('qwerty123'),
            'is_admin' => true,

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
