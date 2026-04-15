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
        Schema::table('inventarios', function (Blueprint $table) {
         $table->string('modelo_teclado')->nullable()->change();
        $table->string('no_serie_teclado')->nullable()->change();
        $table->string('modelo_mause')->nullable()->change();
            $table->string('modelo_cpu')->nullable()->change();
            $table->string('no_serie_cargador')->nullable()->change();
            $table->string('modelo_monitor')->nullable()->change();
            $table->string('no_serie_monitor')->nullable()->change();
            $table->string('no_serie_mause')->nullable()->change();
            $table->string('modelo_nobreak')->nullable()->change();
            $table->string('no_serie_nobreak')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventarios', function (Blueprint $table) {
                // No revertimos a NOT NULL para evitar errores si existen valores nulos
                // Puedes personalizar aquí si necesitas otro comportamiento
    });
    }
};

