<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'amount' => $this->faker->randomElement([10, 20, 30, 40, 50]),
            'code' => $this->faker->randomElement(['1234xyyz', '5677rtyy', '7890yuio']) 
        ];
    }
}
