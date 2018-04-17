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
            $table->increments('user_id');
            $table->string('name');
            $table->integer('phonenumber');
            $table->string('address');
            $table->string('roles');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('state');
            $table->string('branch');
            $table->string('supervisor');
            $table->string('ic_number');
            $table->string('active');
            $table->string('altuser_id')->unique();
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
        Schema::dropIfExists('users');
    }
}
