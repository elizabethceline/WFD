<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("units")->insert([
            [
                'name' => 'Mechanical Engineering',
                'unit_level' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Industrial Engineering',
                'unit_level' => 2,
                'created_at' => now()
            ]
        ]);
    }
}
