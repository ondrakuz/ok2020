<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->updateOrInsert([
            'web_structure_id' => 1,
            'parent_menu_id' => null,
            'name' => 'Home',
            'url' => 'home',
            'title_page' => true,
            'priority' => 10,
            'type_of_page_id' => 1,
            'meta_title' => 'Home',
            'meta_description' => 'Home',
            'meta_key_words' => 'Home',
            'display' => true,
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('menus')->updateOrInsert([
            'web_structure_id' => 1,
            'parent_menu_id' => null,
            'name' => 'Login',
            'url' => 'login',
            'title_page' => false,
            'priority' => 10,
            'type_of_page_id' => 12,
            'meta_title' => 'Login',
            'meta_description' => 'Login',
            'meta_key_words' => 'Login',
            'display' => true,
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('menus')->updateOrInsert([
            'web_structure_id' => 1,
            'parent_menu_id' => null,
            'name' => 'Administrator',
            'url' => 'administrator',
            'title_page' => false,
            'priority' => 10,
            'type_of_page_id' => 13,
            'meta_title' => 'Administrator',
            'meta_description' => 'Administrator',
            'meta_key_words' => 'Administrator',
            'display' => true,
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
