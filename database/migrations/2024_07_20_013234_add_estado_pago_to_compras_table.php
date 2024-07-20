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
        Schema::table('compras', function (Blueprint $table) {
            $table->string('tipo_comprobante_id')->nullable()->index('compra_tipo_comprobante_id_foreign')->after('proveedor_id');

            $table->enum('estado_pago', ['pendiente', 'pagado'])->default('pendiente')->after('total');
            $table->foreign(['tipo_comprobante_id'])->references(['codigo'])->on('tipo_comprobantes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compras', function (Blueprint $table) {
            //
        });
    }
};
