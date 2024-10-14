<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');
            $table->foreignId('comprobante_id')->nullable()->constrained('comprobantes')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->dateTime('fecha_emision')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('motivo')->nullable(); // Motivo de la devolución, opcional
            $table->decimal('total', 11, 4);
            $table->timestamp('fecha_devolucion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('local_id')->constrained('locales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devoluciones');
    }
};
