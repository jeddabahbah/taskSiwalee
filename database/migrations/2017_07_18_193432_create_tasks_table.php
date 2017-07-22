<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Other');
            $table->string('Name');
            $table->string('Platecar');
            $table->string('IdCardT');
            $table->string('IDCard');
            $table->string('Telhome');
            $table->string('Telhand');
            $table->string('Carbrand1');
            $table->string('CarColor1');
            $table->string('CtID');
            $table->string('Status');
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
        Schema::drop('tasks');
    }
}
