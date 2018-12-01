<?php

use Illuminate\Database\Seeder;

class UsersAndPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
            $user->posts()->save(factory(App\Post::class)->make());
        });
    }
}
