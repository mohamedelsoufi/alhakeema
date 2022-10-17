<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Task ' . $this->faker->numberBetween(1,20),
            'description' => $this->faker->realText(200),
            'status' => $this->faker->randomElement(['CANCELLED ','INPROGRESS ','COMPLETED ','HOLD']),
            'user_id' => $this->faker->numberBetween(1,6),
        ];
    }
}
