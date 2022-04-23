<?php

namespace Database\Factories;

use App\Models\Collective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Joined>
 */
class JoinedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
			'collective_id' => Collective::first(),
            'url'           => $this->faker->url(),
			'subject'       => $this->faker->word(),
			'image'         => $this->faker->imageUrl(),
			'approved'      => $this->faker->boolean()
        ];
    }
}
