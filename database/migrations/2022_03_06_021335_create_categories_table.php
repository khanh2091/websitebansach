<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->string('title', 150);
            $table->string('slug', 150);
            $table->string('description', 200)->nullable();
            $table->string('parent_id', 5)->nullable();
            // $table->foreign('parent_id')->references('id')->on('categories');
            $table->timestamps();
        });
        Schema::table('categories', function(Blueprint $table){
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
