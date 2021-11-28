<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(15),
            'description' => $this->faker->text(100),
            'author' => $this->faker->name(),
            'deadline' => $this->faker->dateTimeBetween(
                Carbon::today()->format('Y-m-d H:m:s'),
                Carbon::today()->addMonths(6)->format('Y-m-d H:m:s'))
        ];
    }
}
