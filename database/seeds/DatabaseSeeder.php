<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        
        $this->call(WebStructuresTableSeeder::class);
        
        $this->call(TypesOfPagesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
    }
}
