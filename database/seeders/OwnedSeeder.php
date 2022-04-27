<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Owned;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Owned::factory()
             ->count(50)
             ->create();

        $pivots = [];
        $cats   = Category::inRandomOrder()->select('id')->get();

        $i = 1;

        while ($i <= 50) {
            $pivots[] = [
                'category_id'        => $cats->random()->id,
                'categorizable_id'   => $i,
                'categorizable_type' => 'owned',
            ];
            ++$i;
        }

        $i      = 1;

        while ($i <= rand(20, 100)) {
            $pivots[] = [
                'category_id'        => $cats->random()->id,
                'categorizable_id'   => rand(1, 50),
                'categorizable_type' => 'owned',
            ];
            ++$i;
        }

        DB::table('categorizables')->insert($pivots);
    }
}
