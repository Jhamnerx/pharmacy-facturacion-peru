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
        Schema::create('lotes', function (Blueprint $table) {
            // Migration for lotes table
            Schema::create('lotes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('producto_id')->constrained('productos');
                $table->string('codigo_lote')->nullable();
                $table->date('fecha_vencimiento');
                $table->integer('stock')->default(0);
                $table->decimal('precio_compra', 11, 4);
                $table->decimal('precio_venta', 11, 4);
                $table->timestamps();
                $table->softDeletes();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
