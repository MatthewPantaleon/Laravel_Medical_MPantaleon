<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('postal_address', 6);
			$table->string('phone_number', 11);
			$table->date('start_date');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
