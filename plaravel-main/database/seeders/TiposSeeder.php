<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos')->insert([
            ['nom_tipo'=>'Sedan', 'precio'=>30000],
            ['nom_tipo'=>'Coupe', 'precio'=>50000],
            ['nom_tipo'=>'SUV', 'precio'=>51000],
        ]);
    }
}
