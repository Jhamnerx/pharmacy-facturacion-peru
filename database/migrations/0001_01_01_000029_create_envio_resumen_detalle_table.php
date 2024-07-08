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
        Schema::create('envio_resumen_detalle', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('envio_resumen_id')->nullable()->index('envio_resumen_detalle_envio_resumen_id_foreign');
            $table->unsignedBigInteger('venta_id')->nullable()->index('envio_resumen_detalle_venta_id_foreign');
            $table->string('condicion')->nullable();
            $table->timestamps();

            $table->foreign(['envio_resumen_id'])->references(['id'])->on('envio_resumen')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['venta_id'])->references(['id'])->on('ventas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio_resumen_detalle');
    }
};
