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
        Schema::create('series', function (Blueprint $table) {
            $table->id('id');
            $table->string('tipo_comprobante_id')->index('series_tipo_comprobante_id_foreign');
            $table->string('serie')->nullable();
            $table->string('correlativo');
            $table->unsignedBigInteger('local_id')->nullable()->index('series_local_id_foreign');
            $table->timestamps();

            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['tipo_comprobante_id'])->references(['codigo'])->on('tipo_comprobantes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
