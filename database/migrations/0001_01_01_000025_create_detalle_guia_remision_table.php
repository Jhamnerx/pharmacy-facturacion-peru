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
        Schema::create('detalle_guia_remision', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->string('codigo');
            $table->decimal('cantidad', 15);
            $table->string('unidad_medida');
            $table->string('descripcion');
            $table->unsignedBigInteger('guia_remision_id')->nullable();
            $table->timestamps();

            $table->foreign(['guia_remision_id'], 'fk_detalle_guia')->references(['id'])->on('guia_remision')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['producto_id'], 'fk_guia_d_producto')->references(['id'])->on('productos')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_guia_remision');
    }
};
