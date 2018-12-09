<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Post::all() as $post) {
            foreach (User::all() as $user) {
                $faker = Faker\Factory::create();
                DB::table('comments')->insert([
                    'user_id' => $user->user_id,
                    'post_id' => $post->post_id,
                    'content' => $faker->text(240),
                ]);
            }
        }
    }
}
