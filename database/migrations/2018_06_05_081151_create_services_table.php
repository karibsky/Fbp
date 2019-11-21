<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('fullName', 100);
            $table->string('icon', 100);
            $table->string('picture', 100);
            $table->text('description');
            $table->string('section1', 250);
            $table->string('section2', 250);
            $table->string('section3', 250);
            $table->string('section4', 250);
            $table->text('sectionsDesc1');
            $table->text('sectionsDesc2');
            $table->text('sectionsDesc3');
            $table->text('sectionsDesc4');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
