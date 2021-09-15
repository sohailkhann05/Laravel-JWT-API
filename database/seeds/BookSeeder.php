<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Book;
use App\User;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $user = User::inRandomOrder()->first();
            
            Book::create([
                'user_id' => $user->id,
                'title' => $faker->name,
                'author' => $faker->name,
                'isbn' => \Str::random(8),
                'description' => $faker->sentence(50)
            ]);
        }
    }
}
