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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('local_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
