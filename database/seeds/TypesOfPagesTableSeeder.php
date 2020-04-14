<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesOfPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Page',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Blog',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'E-shop',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Photogalery',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'All_photogaleries',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Forum',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Order',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Basket',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Customer',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Invoicing',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Contact',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Users',
            'switched_on' => true,
        ]);
        DB::table('types_of_pages')->updateOrInsert([
            'type_of_page' => 'Administrator',
            'switched_on' => true,
        ]);
    }
}
