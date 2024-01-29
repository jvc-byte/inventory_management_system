<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("units")->truncate();
        $units = [
            [
                "name" => "4 litres bucket",

            ],
            [
                "name" => "10 litres bucket",
            ],
            [
                "name" => "20 litres bucket",
            ]
        ];

        DB::table("units")->insert($units);
    }
}
