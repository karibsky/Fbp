<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('article', 50)->default(0);
            $table->string('name', 100)->default(0);
            $table->string('description', 250)->default(0);
            $table->integer('category');
            $table->integer('subcategory');
            $table->integer('price');
            $table->string('picture', 40)->default(0);
            $table->string('redarea', 15)->default(0);
            $table->string('greenarea', 15)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog');
    }
}
