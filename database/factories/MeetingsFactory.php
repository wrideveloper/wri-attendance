<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
            'miniclass_id' => $this->faker->numberBetween(1, 5),
            'topik' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'tanggal' => $this->faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'pertemuan' => $this->faker->numberBetween(1, 10),
            'token' => $this->faker->bothify('???????')
        ];
    }
}
