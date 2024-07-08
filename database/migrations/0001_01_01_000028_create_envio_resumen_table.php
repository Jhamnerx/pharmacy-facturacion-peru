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
        Schema::create('envio_resumen', function (Blueprint $table) {
            $table->id('id');
            $table->string('correlativo')->nullable();
            $table->string('resumen')->nullable();
            $table->string('baja')->nullable();
            $table->text('nombre_xml')->nullable();
            $table->longText('clase')->nullable();
            $table->text('code_sunat')->nullable();
            $table->text('hash_cdr')->nullable();
            $table->text('hash')->nullable();
            $table->text('cdr_base64')->nullable();
            $table->text('nombre_cdr')->nullable();
            $table->text('xml_base64')->nullable();
            $table->text('nota')->nullable();
            $table->text('fe_mensaje_error')->nullable();
            $table->text('estado_texto')->nullable();
            $table->string('fe_estado')->nullable();
            $table->text('fe_codigo_error')->nullable();
            $table->text('fe_mensaje_sunat')->nullable();
            $table->text('ticket')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('fecha_generacion')->nullable();
            $table->dateTime('fecha_envio')->nullable();
            $table->unsignedBigInteger('local_id')->nullable()->index('envio_resumen_local_id_foreign');
            $table->timestamps();

            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio_resumen');
    }
};
