<?php

namespace Database\Factories;

use App\Models\Jockey;
use Illuminate\Database\Eloquent\Factories\Factory;

class JockeyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jockey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(20000, 29000),
            'name' => $this->faker->name(),
        ];
    }
}
