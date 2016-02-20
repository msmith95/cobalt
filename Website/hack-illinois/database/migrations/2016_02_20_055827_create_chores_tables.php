<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoresTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('frequency');
            $table->string('finished_today');
            $table->integer('assigned_user_id')->unsigned();
            $table->timestamp('due_date');
            $table->timestamps();

            $table->foreign('assigned_user_id')
                  ->references('id')
                  ->on('users');

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
        Schema::drop('chores');
    }
}
