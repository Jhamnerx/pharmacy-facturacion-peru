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
        Schema::create('movimientos_caja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('caja_chica_id')->constrained('cajas_chicas');
            $table->enum('tipo', ['ingreso', 'egreso']);
            $table->decimal('monto', 10, 2);
            $table->string('descripcion');
            $table->dateTime('fecha');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('local_id')->constrained('locales');
            $table->morphs('movimientoable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_caja');
    }
};
