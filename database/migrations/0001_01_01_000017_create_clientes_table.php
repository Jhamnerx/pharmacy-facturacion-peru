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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id');
            $table->text('razon_social');
            $table->string('tipo_documento_id')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('web_site')->nullable();
            $table->text('ubigeo')->nullable();
            $table->text('direccion')->nullable();
            $table->boolean('estado')->default(true);
            $table->integer('compras')->default(0);
            $table->dateTime('ultima_compra')->nullable();
            $table->unsignedBigInteger('local_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['tipo_documento_id'])->references(['codigo'])->on('tipo_documentos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
