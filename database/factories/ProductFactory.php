<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->randomElement(['Samsung','OPPO','LG','NOKIA','Apple','Dell','Motorola']),
            'category'=>fake()->randomElement(['Mobile','TV','Tablet','Pazer','kindle','laptop']),
            'description'=>fake()->paragraph(1,true),
            'price'=>fake()->numberBetween(200,800),
            'gallery'=>fake()->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg']),            //
        ];
    }
}
