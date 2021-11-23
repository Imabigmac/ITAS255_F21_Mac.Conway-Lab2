<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();
        Post::truncate();
        Category::truncate();
        //Comment::truncate();




        Post::factory(4)->create();

         //OPTIONAL WAY OF ADDIGN A USER
        $user = User::factory()->create([
            'name' => 'mac c'
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id
        ]);



    }
}
