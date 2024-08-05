<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meetingName' => $this->faker->company(),
            'meetingTime' => $this->faker->time(),
            'meetingPlace' => $this->faker->address(),
            'UserID' => $this->faker->numberBetween(1, 10),
        ];
    }
}
