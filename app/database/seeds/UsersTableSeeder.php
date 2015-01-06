<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Saphira\Users\User;


class UsersTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'username' => "joycse06",
            'email' => "joyruet06@gmail.com",
            'password' => 'passj0y',
            'confirmed' => 1,
            'confirmation_code' => bin2hex(openssl_random_pseudo_bytes(16))
        ]);
        foreach(range(2, 10) as $index)
        {
            User::create([
                'username' => $faker->userName(),
                'email' => $faker->email(),
                'password' => 'secret',
                'confirmed' => 1,
                'confirmation_code' => bin2hex(openssl_random_pseudo_bytes(16))
            ]);
        }


    }
}
