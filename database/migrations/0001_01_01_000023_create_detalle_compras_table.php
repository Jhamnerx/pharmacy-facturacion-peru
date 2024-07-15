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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('compras_id');
            $table->string('producto_id')->nullable();
            $table->text('codigo')->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('cantidad', 11, 4);
            $table->decimal('precio', 11, 4);
            $table->decimal('igv', 11, 4)->nullable();
            $table->decimal('importe_total', 11, 4)->nullable();
            $table->timestamps();

            $table->foreign(['compras_id'])->references(['id'])->on('compras')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
