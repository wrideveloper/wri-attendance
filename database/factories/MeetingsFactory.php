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
            'miniclass_id' => $this->faker()->rumberBetween(1, 10),
            'topik' => $this->faker()->sentence(),
            'start-time' => $this->faker()->time(),
            'end-time' => $this->faker()->time(),
            'pertemuan' => $this->faker()->randomDigit(),
            'token' => $this->faker()->randomNumber(5, true)
        ];
    }
}
