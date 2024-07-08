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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id('id');
            $table->string('tipo_comprobante_id');
            $table->foreign('tipo_comprobante_id')->references('codigo')->on('tipo_comprobantes')->onDelete('cascade')->onUpdate('cascade');
            $table->text('serie');
            $table->string('correlativo');
            $table->string('serie_correlativo');
            $table->date('fecha_emision');
            $table->dateTime('fecha_hora_emision')->nullable();
            $table->string('divisa');
            $table->decimal('tipo_cambio', 11)->nullable();
            $table->decimal('op_gravadas', 11)->nullable();
            $table->decimal('op_exoneradas', 11)->nullable();
            $table->decimal('op_inafectas', 11)->nullable();
            $table->decimal('op_gratuitas', 11)->nullable();
            $table->decimal('descuento', 11)->nullable();
            $table->decimal('sub_total', 11, 4)->default(0);
            $table->decimal('icbper', 11, 4)->nullable();
            $table->decimal('igv', 11, 4)->nullable();
            $table->decimal('total', 11, 4)->default(0);
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->string('tipo_comprobante_ref')->nullable();
            $table->string('serie_ref')->nullable();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('invoice_id_new')->nullable();
            $table->string('correlativo_ref')->nullable();
            $table->string('serie_correlativo_ref')->nullable();
            $table->unsignedBigInteger('sustento_id');
            $table->text('sustento_texto')->nullable();
            $table->text('ticket')->nullable();
            $table->boolean('fe_estado')->default(false);
            $table->text('estado_texto')->nullable();
            $table->text('fe_codigo_error')->nullable();
            $table->text('fe_mensaje_error')->nullable();
            $table->text('fe_mensaje_sunat')->nullable();
            $table->text('nota')->nullable();
            $table->text('nombre_xml')->nullable();
            $table->text('nombre_cdr')->nullable();
            $table->text('xml_base64')->nullable();
            $table->text('cdr_base64')->nullable();
            $table->text('hash')->nullable();
            $table->text('hash_cdr')->nullable();
            $table->text('code_sunat')->nullable();
            $table->longText('clase')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('local_id')->nullable();
            $table->timestamps();


            $table->foreign(['cliente_id'])->references(['id'])->on('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['invoice_id'])->references(['id'])->on('ventas')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['invoice_id_new'])->references(['id'])->on('ventas')->onUpdate('restrict')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobantes');
    }
};
