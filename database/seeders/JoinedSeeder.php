<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Joined;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoinedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Joined::factory()
              ->count(50)
              ->create();

        $pivots = [];
        $cats   = Category::inRandomOrder()->select('id')->get();

        $i = 1;

        while ($i <= 50) {
            $pivots[] = [
                'category_id'        => $cats->random()->id,
                'categorizable_id'   => $i,
                'categorizable_type' => 'joined',
            ];
            ++$i;
        }

        $i      = 1;

        while ($i <= rand(20, 100)) {
            $pivots[] = [
                'category_id'        => $cats->random()->id,
                'categorizable_id'   => rand(1, 50),
                'categorizable_type' => 'joined',
            ];
            ++$i;
        }

        DB::table('categorizables')->insert($pivots);
    }
}
