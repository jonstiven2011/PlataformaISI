<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('nameinstru');
            $table->string('instrucciones')->default('pdf/no_pdf.pdf');
            $table->string('present')->default('pdf/no_pdf.pdf');
            $table->string('present_2')->default('pdf/no_pdf.pdf');
            $table->string('pdrive')->default('No incluye link');
            $table->string('pdrive_2')->default('No incluye link');
            $table->string('formulario')->default('no hay formulario');
            $table->string('formulario_2')->default('no hay formulario');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
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
        Schema::dropIfExists('clases');
    }
}
