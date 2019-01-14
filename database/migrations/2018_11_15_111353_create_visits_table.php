<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
			$table->date('date');
			$table->time('time');
			$table->integer('duration');
			$table->double('price', 15, 2);
            $table->timestamps();
			
			
			//foreign key constraints on doctors and patients
			$table->foreign('doctor_id')->references('id')->on('doctors');
			$table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
