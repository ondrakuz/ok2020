<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebStructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_structures')->updateOrInsert([
            'web_structure' => 'horizontal menu',
            'switched_on' => true,
        ]);
        DB::table('web_structures')->updateOrInsert([
            'web_structure' => 'vertical menu',
            'switched_on' => false,
        ]);
        DB::table('web_structures')->updateOrInsert([
            'web_structure' => 'left block',
            'switched_on' => false,
        ]);
        DB::table('web_structures')->updateOrInsert([
            'web_structure' => 'right block',
            'switched_on' => false,
        ]);
    }
}
