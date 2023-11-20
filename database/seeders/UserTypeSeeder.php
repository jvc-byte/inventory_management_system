<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("user_types")->truncate();
        $user_types = [
            [
                "name" => "Admin",
                "created_at" => date("y-m-d h:i:s"),
                "updated_at" => date("y-m-d h:i:s"),

            ],
            [
                "name" => "Sales Rep",
                "created_at" => date("y-m-d h:i:s"),
                "updated_at" => date("y-m-d h:i:s"),
            ],
            [
                "name" => "Warehouse Rep",
                "created_at" => date("y-m-d h:i:s"),
                "updated_at" => date("y-m-d h:i:s"),
            ]
        ];

        DB::table("user_types")->insert($user_types);
    }
}
