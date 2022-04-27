<?php

namespace Database\Factories;

use App\Models\Collective;
use App\Models\Owned;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owned>
 */
class OwnedFactory extends Factory
{
    public function configure()
    {
        return $this->afterMaking(function (Owned $owned) {
            if ($owned->status == 'current') {
                $owned->opened = $this->faker->dateTimeThisMonth();
            }
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $statuses = collect(['current', 'upcoming']);

        return [
            'collective_id'       => Collective::first(),
            'subject'             => $this->faker->word(),
            'status'              => $statuses->random(),
            'slug'                => $this->faker->slug(2, false),
            'title'               => $this->faker->words(3, true),
            'image'               => $this->faker->image(),
            'hold_member_updates' => $this->faker->boolean(),
            'notify_pending'      => $this->faker->boolean(),
            'sort_by'             => 'country',
        ];
    }
}
