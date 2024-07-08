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
        Schema::create('locales', function (Blueprint $table) {
            $table->id('id');
            $table->text('nombre');
            $table->text('direccion')->nullable();
            $table->unsignedBigInteger('empresa_id')->default(1);
            $table->timestamps();

            $table->foreign(['empresa_id'])->references(['id'])->on('empresa')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
