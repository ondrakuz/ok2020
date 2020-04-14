<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id');
            $table->string('title', 255);
            $table->string('url', 255)->unique();
            $table->bigInteger('user_id');
            $table->boolean('published');
            $table->string('description', 255);
            $table->string('key_words', 255);
            $table->text('perex');
            $table->text('content');
            $table->boolean('discussion')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
