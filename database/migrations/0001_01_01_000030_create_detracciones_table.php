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
        Schema::create('detracciones', function (Blueprint $table) {
            $table->id('id');
            $table->string('codigo_detraccion')->nullable()->index('detracciones_codigo_detraccion_foreign');
            $table->decimal('porcentaje', 12);
            $table->decimal('monto', 12);
            $table->decimal('tipo_cambio', 12, 4);
            $table->string('metodo_pago_id')->nullable();
            $table->unsignedBigInteger('venta_id')->nullable()->index('detracciones_venta_id_foreign');
            $table->text('cuenta_bancaria')->nullable();
            $table->timestamps();

            $table->foreign(['codigo_detraccion'])->references(['codigo'])->on('codigos_detracciones')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['venta_id'])->references(['id'])->on('ventas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detracciones');
    }
};
