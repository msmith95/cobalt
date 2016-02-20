<?php

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
            $table->increments('id');
            $table->string('name');
            $table->string('paid');
            $table->integer('apartment_id')->unsigned();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('numberOfCompletedChores');
            $table->integer('numberOfIncompletedChores');
            $table->string('apikey');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('apartment_id')
                  ->references('id')
                  ->on('apartments')
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
        Schema::drop('users');
    }
}
