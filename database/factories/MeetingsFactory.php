<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'miniclass_id' => $this->faker->numberBetween(1, 5),
            'topik' => $this->faker->sentence(),
            'tanggal' => $this->faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'pertemuan' => $this->faker->randomDigit(),
            'token' => $this->faker->bothify('???????')
        ];
    }
}
