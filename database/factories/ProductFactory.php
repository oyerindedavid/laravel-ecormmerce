<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->randomElement(['Demo chair', 'Sample chair', 'Test chair', 'Rest chair', 'Sit chair', 'Demo chair']),
            'image_url' => $this->faker->numberBetween(1, 12),
            'categories_id' => $this->faker->numberBetween(1, 4),
            'is_new' => $this->faker->randomElement(['New', 'Sale']),
            'product_description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
            'sizes' => 'M,S,L,SL,XL',
            'colors' => '1,2,7,3,4'
        ];
    }
}
