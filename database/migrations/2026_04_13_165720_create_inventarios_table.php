<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('no_resguardo');
            $table->string('id_equipo');
            $table->string('tipo_equipo');
            $table->string('modelo_cpu');
            $table->string('no_serie_cpu');
            $table->string('modelo_monitor');
            $table->string('no_serie_monitor');
            $table->string('modelo_teclado');
            $table->string('no_serie_cargador');
            $table->string('no_serie_teclado');
            $table->string('modelo_mause');
            $table->string('no_serie_mause');
            $table->string('modelo_nobreak');
            $table->string('no_serie_nobreak');
            $table->string('usuario');
            $table->string('no_empleado');
            $table->string('puesto');
            $table->string('area_asignada');
            $table->string('unidad_administrativa');
            $table->string('no_contacto');
            $table->string('correo_electronico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
