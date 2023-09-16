<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'photo' => $this->faker->imageUrl(640, 480, 'furnitures', true),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
