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
        Schema::create('guia_remision', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('cliente_id')->index('guia_remision_cliente_id_foreign');
            $table->string('serie');
            $table->string('correlativo');
            $table->string('serie_correlativo');
            $table->date('fecha_emision');
            $table->unsignedBigInteger('venta_id')->nullable()->index('guia_remision_venta_id_foreign');
            $table->string('terceros_tipo_documento')->nullable();
            $table->string('terceros_num_doc')->nullable();
            $table->text('terceros_razon_social')->nullable();
            $table->string('codigo_traslado')->nullable();
            $table->string('motivo_traslado_id')->nullable()->index('guia_remision_motivo_traslado_id_foreign');
            $table->text('descripcion_motivo_traslado')->nullable();
            $table->string('modalidad_transporte_id')->nullable();
            $table->date('fecha_inicio_traslado')->nullable();
            $table->string('transp_tipo_doc')->nullable();
            $table->string('transp_numero_doc')->nullable();
            $table->text('transp_razon_social')->nullable();
            $table->string('transp_placa')->nullable();
            $table->string('tipo_doc_chofer')->nullable();
            $table->string('numero_doc_chofer')->nullable();
            $table->string('peso')->nullable();
            $table->string('cantidad_items')->nullable();
            $table->string('numero_contenedor')->nullable();
            $table->text('datos_puerto')->nullable();
            $table->text('direccion_partida')->nullable();
            $table->string('ubigeo_partida')->nullable();
            $table->text('direccion_llegada')->nullable();
            $table->string('ubigeo_llegada')->nullable();
            $table->string('codigo_establecimiento_llegada')->nullable();
            $table->string('codigo_establecimiento_partida')->nullable();
            $table->string('docu_rel_tipo')->nullable();
            $table->string('docu_rel_numero')->nullable();
            $table->text('observacion')->nullable();
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
            $table->unsignedBigInteger('local_id')->nullable()->index('guia_remision_local_id_foreign');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->text('qr')->nullable();
            $table->text('ticket')->nullable();


            $table->foreign(['cliente_id'])->references(['id'])->on('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['motivo_traslado_id'])->references(['codigo'])->on('motivo_traslado')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['venta_id'])->references(['id'])->on('ventas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guia_remision');
    }
};
