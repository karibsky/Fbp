<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mainTitle', 100);
            $table->string('firstTitle', 50);
            $table->string('secondTitle', 50);
            $table->text('firstDesc');
            $table->text('secondDesc');
            $table->string('firstVideo', 50);
            $table->string('secondVideo', 50);
            $table->string('thirdVideo', 50);
            $table->string('picture', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
