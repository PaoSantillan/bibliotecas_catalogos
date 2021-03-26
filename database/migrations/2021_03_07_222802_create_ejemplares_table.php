<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjemplaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplares', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_ejemplar_id');
            $table->foreign('tipo_ejemplar_id')->references('id')->on('tipo_ejemplar');
            $table->unsignedInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->integer('cantidad')->nullable();
            $table->string('autor')->nullable();
            $table->string('titulo')->nullable();
            $table->string('observaciones')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('dia')->nullable();
            $table->integer('mes')->nullable();
            $table->integer('anio')->nullable();
            $table->integer('numero_inventario')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('volumen')->nullable();
            $table->string('donado')->nullable();
            $table->string('editorial')->nullable();
            $table->boolean('mostrar')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejemplares');
    }
}
