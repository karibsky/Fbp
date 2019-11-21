<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('lastname',30);
            $table->string('patronymic',30);
            $table->string('email',50)->unique();
            $table->string('phone', 20);
            $table->string('versionMobile',50);
            $table->string('status',50);
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
        Schema::dropIfExists('programmers');
    }
}
