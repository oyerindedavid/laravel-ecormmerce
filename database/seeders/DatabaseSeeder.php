<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
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

        Product::factory(12)->create([
            'user_id' => $user->id
        ]);
    }
}
