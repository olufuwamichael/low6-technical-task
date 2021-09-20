<?php

namespace Database\Factories;

use App\Models\Horse;
use App\Models\Trainer;
use App\Models\Jockey;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(200000, 290000),
            'name' => $this->faker->name(),
            'bred' => $this->faker->boolean(50),
            'status' => $this->faker->boolean(50) ? 'Runner' : 'NonRunner',
            'cloth_number' => $this->faker->numberBetween(1, 100),
            'weight_units' => $this->faker->boolean(50) ? 'lbs' : 'kg',
            'weight_value' => $this->faker->numberBetween(100, 200),
            'weight_text' => $this->faker->name(), // Calculate weight text and randomise
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Horse $horse) {
            $jockey = Jockey::all()->random(1)->first();
            $trainer = Trainer::all()->random(1)->first();
            $horse->jockey_id = $jockey->id;
            $horse->trainer_id = $trainer->id;

            return $horse;
        });
    }
}
