<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

      /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'founded' => fake(),
            'description' => fake()->paragraph(),
            'image_path' =>fake()->image('public/images',640,480, null, false),
            
            
        ];
    }
}
