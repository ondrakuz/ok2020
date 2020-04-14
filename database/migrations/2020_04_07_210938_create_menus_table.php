<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('web_structure_id', false, true);
            $table->bigInteger('parent_menu_id', false, true)->nullable();
            //$table->smallInteger('language_id', false, true);
            $table->string('name', 80);
            $table->string('url', 255)->unique();
            $table->boolean('title_page')->default(0);
            $table->smallInteger('priority');
            $table->smallInteger('type_of_page_id');
            $table->string('meta_title', 255);
            $table->string('meta_description', 255);
            $table->string('meta_key_words', 255);
            $table->boolean('display')->default(0);
            $table->timestamps();
            
//             $table->foreign('type_of_page_id')
//                 ->references('id')->on('types_of_pages')
//                 ->onDelete('restrict')
//                 ->onUpdate('restrict');
//             $table->foreign('web_structure_id')
//                 ->references('id')->on('web_structures')
//                 ->onDelete('restrict')
//                 ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
