<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            
            $table->enum('estado', ['presente', 'falta','licencia'])->default('presente');

            // Llave foranea
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('ready_id')->nullable();
            // Restrigcion de la llave foranea
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); 
            $table->foreign('ready_id')->references('id')->on('readys')->onDelete('cascade');


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
        Schema::dropIfExists('attendances');
    }
}
