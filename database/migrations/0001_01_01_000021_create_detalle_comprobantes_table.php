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
        Schema::create('detalle_comprobantes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('comprobante_id')->nullable();
            $table->unsignedBigInteger('producto_id');
            $table->text('codigo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('unit')->nullable();
            $table->text('unit_name')->nullable();
            $table->string('codigo_afectacion')->nullable();
            $table->string('tipo_precio')->nullable();
            $table->decimal('cantidad', 11, 4);
            $table->decimal('valor_unitario', 11, 6);
            $table->decimal('precio_unitario', 11, 4);
            $table->boolean('afecto_icbper')->default(false);
            $table->decimal('icbper', 11, 4)->nullable();
            $table->decimal('total_icbper', 11, 4)->nullable();
            $table->decimal('igv', 11, 4)->nullable();
            $table->string('porcentaje_igv')->nullable();
            $table->decimal('descuento', 11)->nullable();
            $table->decimal('descuento_factor', 11, 5)->nullable();
            $table->decimal('sub_total', 11, 4)->nullable();
            $table->decimal('total', 11, 4)->nullable();
            $table->timestamps();

            $table->foreign(['comprobante_id'])->references(['id'])->on('comprobantes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['producto_id'])->references(['id'])->on('productos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_comprobantes');
    }
};
