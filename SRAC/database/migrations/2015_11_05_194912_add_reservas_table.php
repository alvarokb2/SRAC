<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->integer('numero_canchas')->default('1');
            $table->integer('dias')->default('127');
            $table->enum('estado', ['pendiente','completada', 'perdida', 'cancelada'])->default('pendiente');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('reservas');
    }
}
