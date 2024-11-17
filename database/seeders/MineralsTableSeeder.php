<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MineralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('minerals')->insert([
            ['name' => 'Quartz', 'slug' => 'quartz'],
            ['name' => 'Feldspar', 'slug' => 'feldspar'],
            ['name' => 'Mica', 'slug' => 'mica'],
            ['name' => 'Calcite', 'slug' => 'calcite'],
            ['name' => 'Gypsum', 'slug' => 'gypsum'],
        ]);
    }
}
