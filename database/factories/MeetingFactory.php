<?php

namespace Database\Factories;

use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(20000, 29000),
            'country' => $this->faker->name(),
            'status' => $this->faker->name(),
            'date' => $this->faker->date(),
            'course' => $this->faker->name(),
            'revision' => $this->faker->numberBetween(0, 10)
        ];
    }
}
