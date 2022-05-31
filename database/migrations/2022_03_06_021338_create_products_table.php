<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('slug');
            $table->decimal('price');
            $table->bigInteger('quantity');
            $table->bigInteger('sold')->default(0);
            $table->text('images');
            $table->integer('page_number');
            $table->string('description');
            $table->float('discount');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamp('publication_date')->nullbale();
            $table->timestamp('reprint_date')->nullable();
            $table->string('category_id');
            $table->string('language_id');
            $table->string('publisher_id');
            $table->string('author_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('author_id')->references('id')->on('authors');
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
        Schema::dropIfExists('products');
    }
}
