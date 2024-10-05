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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->morphs('paymentable');
            $table->decimal('monto', 11, 4);
            $table->string('descripcion');
            $table->dateTime('fecha');
            $table->string('metodo_pago_id');
            $table->boolean('payed')->default(false);
            $table->string('numero_referencia')->nullable();
            $table->foreignId('caja_chica_id')->constrained('cajas_chicas');

            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
