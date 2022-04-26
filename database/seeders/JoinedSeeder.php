<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Joined;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JoinedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Joined::factory()
		      ->count(50)
			  ->hasAttached(Category::inRandomOrder()->limit(rand(0,10)))
			  ->create();
    }
}
