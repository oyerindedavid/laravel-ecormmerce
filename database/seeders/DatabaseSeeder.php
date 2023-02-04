<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Product;
use App\Models\Color;
use Illuminate\Database\Seeder;

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

       $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john-doe@gmail.com',
        ]);

        Color::factory()
              ->count(7)
              ->sequence(
                     ['name' => 'Light Salmon'], 
                     ['name' => 'Dark Salmon'],
                     ['name' => 'Tomato'],
                     ['name' => 'Deep Sky Blue'],
                     ['name' => 'Electric Purple'],
                     ['name' => 'Atlantis'], 
                     ['name' => 'Deep Lilac'])
              ->create();

        Category::factory(4)
              ->count(7)
              ->sequence(
                     ['name' => 'Chair'], 
                     ['name' => 'Furniture'],
                     ['name' => 'Top brands'],
                     ['name' => 'Accessories'])
              ->create();

        Product::factory(32)->create([
            'user_id' => $user->id
        ]);

        

        
    }
}
