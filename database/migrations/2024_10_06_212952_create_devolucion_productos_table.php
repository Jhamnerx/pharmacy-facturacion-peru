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
        Schema::create('devolucion_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devolucion_id')->constrained('devoluciones')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->boolean('return_stock')->default(true);
            $table->string('codigo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('unit')->nullable();
            $table->text('unit_name')->nullable();
            $table->string('codigo_afectacion')->nullable();
            $table->string('tipo_precio')->nullable();
            $table->decimal('cantidad', 11, 4);
            $table->decimal('valor_unitario', 11, 6);
            $table->decimal('precio_unitario', 11, 6);
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devolucion_productos');
    }
};
