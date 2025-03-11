<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FilamentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('filament_users')->insert([
            ['id'=> '1',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super_admin@bnb.bt',
            'password' => Hash::make('edash@BNBL2025'),
            ],
        ]);
    }
}
