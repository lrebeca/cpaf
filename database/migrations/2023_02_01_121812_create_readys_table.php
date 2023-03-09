<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readys', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable();
            $table->string('detalle')->nullable();

            // Llave foranea
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            // Restrigcion de la llave foranea
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); 
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade'); 

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
        Schema::dropIfExists('readys');
    }
}
