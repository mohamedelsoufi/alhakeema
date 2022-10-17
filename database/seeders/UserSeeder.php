<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::create([
           'name' => 'Admin',
           'email' => 'admin@app.com',
            'password' => '123456',
            'is_admin' => 1,
            'active' => 1,
        ]);
        for ($u=0; $u<5; $u++){
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => '123456',
                'is_admin' => 0,
                'active' => 1,
            ]);
        }
    }
}
