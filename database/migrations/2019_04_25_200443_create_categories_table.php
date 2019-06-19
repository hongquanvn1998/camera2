<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name_categories',150)->unique();
            $table->tinyInteger('status')->default(1);
            $table->integer('id_parent')->unsigned();
            $table->timestamps();

            $table->foreign('id_parent')
                  ->references('id')->on('parentcategories')
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
        Schema::dropIfExists('categories');
        Schema::disableForeignKeyConstraints();
    }
}
