<?php

namespace Database\Seeders;

use App\Models\Posts;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    public function run()
    {
        $faker_en = FakerFactory::create('en_US');

        for ($i = 0; $i < 10; $i++) {
            Posts::create([
                'user_id' => 1,
                'title' => $faker_en->sentence(2, true),
                'short' => $faker_en->sentence(rand(10, 20)),
                'description' => $faker_en->sentence(rand(40, 80), true),
            ]);
        }
    }
}
