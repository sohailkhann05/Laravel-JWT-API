<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
    	        'name' => $faker->name, 
    	        'email' => $faker->unique()->safeEmail, 
    	        'password' => bcrypt('password')
            ]);
        }
    }
}
