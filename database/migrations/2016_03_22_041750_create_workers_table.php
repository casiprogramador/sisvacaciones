<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ci');
            $table->string('cellphone');
            $table->string('photo');
            $table->date('date_in');
            $table->date('date_out');
            $table->string('position');
            $table->string('email')->unique();
            $table->smallInteger('state')->default('0');
            $table->timestamps();
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
