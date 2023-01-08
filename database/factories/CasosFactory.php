<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\casos>
 */
class CasosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fallecido' => fake()->numberBetween(0,1),
            'sexo' => fake()->numberBetween(0,1),
            'id_mes' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
            'id_region' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16])  
        ];
    }
    
}
