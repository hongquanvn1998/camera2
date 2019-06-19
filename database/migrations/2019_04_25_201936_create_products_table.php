<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();  
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',150)->unique();
            $table->integer('brand_id')->unsigned();
            $table->string('color_id',150);
            $table->string('sizeNumber_id',150)->nullable();
            $table->string('sizeLetter_id',150)->nullable();
            $table->integer('categories_id')->unsigned();
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('sale_off')->nullable();
            $table->text('description')->nullable();
            $table->string('url_image',150);
            $table->integer('highlight')->default(0);
            $table->timestamps();
            $table->foreign('brand_id')
                  ->references('id')->on('brand')
                  ->onDelete('cascade');
                   
            $table->foreign('categories_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
