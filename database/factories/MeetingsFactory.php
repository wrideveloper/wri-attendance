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
            'miniclasses_id' => $this->faker()->numberBetween(1, 10),
            'topik' => $this->faker()->sentence(),
            'start_time' => $this->faker()->time(),
            'end_time' => $this->faker()->time(),
            'pertemuan' => $this->faker()->randomDigit(),
            'token' => $this->faker()->randomNumber(5, true)
        ];
    }
}
