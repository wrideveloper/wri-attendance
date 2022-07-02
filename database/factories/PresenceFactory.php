<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PresenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'miniclass_meetings_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'presence_date' => $this->faker->dateTimeBetween('-1 hours', 'now'),
            'status' => $this->faker->randomElement(['Hadir', 'Sakit', 'Izin', 'Alpha']),
            'ket' => $this->faker->sentence,
            'feedback' => $this->faker->text,
        ];
    }
}
