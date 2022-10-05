<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {

            $table->id();
            $table->string('sufix')->nullable();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email');
            $table->char('carnet_identidad',10);
            $table->char('carnet_universitario', 8)->nullable();
            $table->string('carrera')->nullable();
            $table->string('empleo')->nullable();
            $table->text('n_celular');
            $table->text('n_celular2')->nullable();
            $table->string('n_deposito')->nullable();
            $table->string('img_deposito')->nullable();

            $table->enum('estado', ['estudiante', 'profesional']);
            $table->enum('pago', ['deposito', 'transferencia'])->nullable();
            $table->enum('progreso', ['enviado', 'aprobado', 'rechazado']);
            $table->integer('costo_e')->nullable();

            //Llave foranea
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('certificate_id')->nullable();
            // Restrigcion de llave foranea
            $table->foreign('id_evento')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');

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
        Schema::dropIfExists('students');
    }
}
