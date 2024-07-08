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
        Schema::create('anticipos_ventas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('venta_id')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('serie_correlativo_ref')->nullable();
            $table->string('tipo_comprobante_ref')->nullable();
            $table->decimal('valor_venta_ref', 12, 4)->nullable();
            $table->decimal('igv', 12, 4)->nullable();
            $table->decimal('total_invoice_ref', 12, 4)->nullable();
            $table->string('codigo_anticipo')->nullable();
            $table->decimal('factor_anticipo', 12)->nullable();
            $table->dateTime('fecha_emision_ref')->nullable();
            $table->timestamps();

            $table->foreign(['venta_id'])->references(['id'])->on('ventas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anticipos_ventas');
    }
};
