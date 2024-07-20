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
        Schema::table('detalle_compras', function (Blueprint $table) {
            $table->text('codigo_lote')->nullable()->after('codigo');
            $table->text('fecha_vencimiento')->nullable()->after('codigo_lote');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_compras', function (Blueprint $table) {
            //
        });
    }
};
