<?php

namespace Database\Factories;

use App\Models\Meetings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'meetings_id' => Meetings::factory()->create()->id,
            'nim' => User::factory()->create()->nim,
            'presence_date' => $this->faker->dateTimeBetween('-1 hours', 'now'),
            'status' => $this->faker->randomElement(['Hadir', 'Sakit', 'Izin', 'Alpha']),
            'ket' => $this->faker->sentence,
            'token' => $this->faker->bothify('???????'),
            'feedback' => $this->faker->text,
        ];
    }
}
