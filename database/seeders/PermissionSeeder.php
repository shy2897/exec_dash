<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([

            ['id'=> '11', 'name' => 'finance.view', 'guard_name' => 'filament'],
            ['id'=> '12', 'name' => 'finance.create', 'guard_name' => 'filament'],
            ['id'=> '13', 'name' => 'finance.update', 'guard_name' => 'filament'],
            ['id'=> '14', 'name' => 'finance.delete', 'guard_name' => 'filament'],
            ['id'=> '15', 'name' => 'finance_graph.view', 'guard_name' => 'filament'],
            ['id'=> '21', 'name' => 'operation.view', 'guard_name' => 'filament'],
            ['id'=> '22', 'name' => 'operation.create', 'guard_name' => 'filament'],
            ['id'=> '23', 'name' => 'operation.update', 'guard_name' => 'filament'],
            ['id'=> '24', 'name' => 'operation.delete', 'guard_name' => 'filament'],
            ['id'=> '25', 'name' => 'operation_graph.view', 'guard_name' => 'filament'],
            ['id'=> '31', 'name' => 'bankingchannel.view', 'guard_name' => 'filament'],
            ['id'=> '32', 'name' => 'bankingchannel.create', 'guard_name' => 'filament'],
            ['id'=> '33', 'name' => 'bankingchannel.update', 'guard_name' => 'filament'],
            ['id'=> '34', 'name' => 'bankingchannel.delete', 'guard_name' => 'filament'],
            ['id'=> '35', 'name' => 'bankingchannel_graph.view', 'guard_name' => 'filament'],
            ['id'=> '41', 'name' => 'hrm.view', 'guard_name' => 'filament'],
            ['id'=> '42', 'name' => 'hrm.create', 'guard_name' => 'filament'],
            ['id'=> '43', 'name' => 'hrm.update', 'guard_name' => 'filament'],
            ['id'=> '44', 'name' => 'hrm.delete', 'guard_name' => 'filament'],
            ['id'=> '45', 'name' => 'hrm_graph.view', 'guard_name' => 'filament'],

        ]);

        DB::table('roles')->insert([

            ['id'=> '2', 'name' => 'ceo', 'guard_name' => 'filament'],
            ['id'=> '3', 'name' => 'finance', 'guard_name' => 'filament'],
            ['id'=> '4', 'name' => 'operation', 'guard_name' => 'filament'],
            ['id'=> '5', 'name' => 'bankingchannel', 'guard_name' => 'filament'],
            ['id'=> '6', 'name' => 'hrm', 'guard_name' => 'filament'],

        ]);

        DB::table('role_has_permissions')->insert([

            ['permission_id' => '15', 'role_id' => '2'],
            ['permission_id' => '25', 'role_id' => '2'],
            ['permission_id' => '35', 'role_id' => '2'],
            ['permission_id' => '45', 'role_id' => '2'],

            ['permission_id' => '11', 'role_id' => '3'],
            ['permission_id' => '12', 'role_id' => '3'],
            ['permission_id' => '13', 'role_id' => '3'],
            ['permission_id' => '14', 'role_id' => '3'],
            ['permission_id' => '15', 'role_id' => '3'],

            ['permission_id' => '21', 'role_id' => '4'],
            ['permission_id' => '22', 'role_id' => '4'],
            ['permission_id' => '23', 'role_id' => '4'],
            ['permission_id' => '24', 'role_id' => '4'],
            ['permission_id' => '25', 'role_id' => '4'],

            ['permission_id' => '31', 'role_id' => '5'],
            ['permission_id' => '32', 'role_id' => '5'],
            ['permission_id' => '33', 'role_id' => '5'],
            ['permission_id' => '34', 'role_id' => '5'],
            ['permission_id' => '35', 'role_id' => '5'],

            ['permission_id' => '41', 'role_id' => '6'],
            ['permission_id' => '42', 'role_id' => '6'],
            ['permission_id' => '43', 'role_id' => '6'],
            ['permission_id' => '44', 'role_id' => '6'],
            ['permission_id' => '45', 'role_id' => '6'],

        ]);
    }
}
