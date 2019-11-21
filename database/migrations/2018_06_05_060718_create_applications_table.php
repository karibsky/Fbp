<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('lastname', 30);
            $table->string('patronymic', 30);
            $table->string('email', 60)->unique();
            $table->string('phone', 20);
            $table->string('IDversion', 200);
            $table->string('regnumber', 255);
            $table->string('organisation', 255);
            $table->boolean('isSend')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
