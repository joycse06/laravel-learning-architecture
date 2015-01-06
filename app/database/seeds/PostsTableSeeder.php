<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

use Saphira\Posts\Post;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,20) as $index)
        {
            Post::create([
                'title' => $faker->sentence(),
                'content' => $faker->paragraph()
            ]);
        }
    }
}