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
            $table->string('instrucciones')->default('pdf/no_pdf.pdf');
            $table->string('video')->default('mp4/no_video.mp4');
            $table->string('presentacion')->default('presentaciones/no_present.pptx');
            $table->string('presentacion_2')->default('presentaciones/no_present2.pptx');
            $table->string('prezi')->default('No incluye link');
            $table->string('prezi_2')->default('No incluye link');
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
