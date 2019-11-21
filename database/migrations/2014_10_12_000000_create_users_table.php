<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 30);
            $table->string('lastname', 30);
            $table->string('patronymic', 30);
            $table->string('email', 80)->unique();
            $table->string('phone', 11);
            $table->string('IDversion', 200);
            $table->string('regnumber', 255);
            $table->string('organisation', 255);
            $table->string('password', 255)->default('null');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
