<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            'nick' => 'admin',
            'email' => 'admin@localhost.loc',
            'role_id' => 1,
        ], [
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->updateOrInsert([
            'nick' => 'ondrak',
            'email' => 'ondrej.kuzel@gmail.com',
            'role_id' => 1,
        ], [
            'password' => Hash::make('P4573rN4k@#'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
