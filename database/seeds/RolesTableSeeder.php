<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Generate system roles
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->updateOrInsert([
            'name' => 'Administrator',
            'slug' => 'admin',
        ]);
        DB::table('roles')->updateOrInsert([
            'name' => 'Manager',
            'slug' => 'manager',
        ]);
        DB::table('roles')->updateOrInsert([
            'name' => 'Moderator',
            'slug' => 'moderator',
        ]);
        DB::table('roles')->updateOrInsert([
            'name' => 'Registered',
            'slug' => 'registered',
        ]);
    }
}
