<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::table('collectives')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name'       => 'marley',
            'email'      => 'mar@m.punkfairie.net',
            'title'      => 'aeipathy',
            'password'   => bcrypt('marfan4'),
        ]);

        $this->call([
            CategorySeeder::class,
            JoinedSeeder::class,
            OwnedSeeder::class,
        ]);
    }
}
