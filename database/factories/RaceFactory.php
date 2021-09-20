<?php

namespace Database\Factories;

use App\Models\Race;
use App\Models\Horse;
use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Race::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(100000, 100500),
            'date' => $this->faker->date(),
            'time' => $this->faker->name(),
            'runners' => $this->faker->numberBetween(10, 50),
            'handicap' => $this->faker->boolean(50),
            'showcase' => $this->faker->boolean(50),
            'trifecta' => $this->faker->boolean(50),
            'stewards' => $this->faker->name(),
            'status' => $this->faker->name(),
            'revision' => $this->faker->numberBetween(1, 10),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Race $race) {
            $meeting = Meeting::factory()->create();
            $race->meeting_id = $meeting->id;

            return $race;
        })->afterCreating(function (Race $race) {
            $horses = Horse::all()->random(20);
            $race->horses()->attach($horses->pluck('id'));
            $race->save();
        });
    }
}
