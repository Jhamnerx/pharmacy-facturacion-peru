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
        Schema::create('cajas_chicas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_referencia')->nullable();
            $table->decimal('monto_inicial', 11, 4);
            $table->decimal('monto_final', 11, 4)->nullable();
            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre')->nullable();
            $table->enum('estado', ['abierta', 'cerrada'])->default('abierta');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('local_id')->constrained('locales');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas_chicas');
    }
};
