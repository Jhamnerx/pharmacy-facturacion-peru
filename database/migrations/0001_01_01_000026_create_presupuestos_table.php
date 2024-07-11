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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('uuid')->unique()->nullable();
            $table->string('tipo_comprobante_id')->index('ventas_tipo_comprobante_id_foreign');
            $table->string('tipo_operacion')->nullable()->default('0101');
            $table->string('serie');
            $table->string('correlativo');
            $table->string('serie_correlativo');
            $table->unsignedBigInteger('cliente_id')->index('ventas_cliente_id_foreign');
            $table->date('fecha_emision');
            $table->dateTime('fecha_hora_emision')->nullable();
            $table->date('fecha_vencimiento');
            $table->string('divisa')->nullable();
            $table->decimal('tipo_cambio', 11)->nullable();
            $table->string('metodo_pago_id');
            $table->text('comentario')->nullable();
            $table->decimal('op_gravadas', 11)->nullable();
            $table->decimal('op_exoneradas', 11)->nullable();
            $table->decimal('op_inafectas', 11)->nullable();
            $table->decimal('op_gratuitas', 11)->nullable();
            $table->decimal('igv_op', 11)->default(0);
            $table->decimal('descuento', 11);
            $table->string('tipo_descuento')->nullable();
            $table->decimal('descuento_factor', 11, 5)->nullable();
            $table->decimal('icbper', 11, 4)->nullable();
            $table->decimal('sub_total', 11, 4)->default(0);
            $table->decimal('igv', 11, 4)->nullable();
            $table->decimal('adelanto', 15, 4)->default(0);
            $table->decimal('total', 11, 4)->default(0);
            $table->decimal('pago', 11, 4)->default(0);
            $table->decimal('vuelto', 11, 4)->default(0);
            $table->boolean('pago_anticipado')->default(false);
            $table->string('numero_cuotas')->nullable();
            $table->string('vence_cuotas')->nullable();
            $table->text('detalle_cuotas')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->enum('anulado', ['si', 'no'])->default('no');
            $table->enum('resumen', ['si', 'no'])->default('no');
            $table->enum('estado', ['COMPLETADO', 'BORRADOR'])->default('BORRADOR');
            $table->enum('pago_estado', ['UNPAID', 'PAID'])->default('UNPAID');
            $table->enum('forma_pago', ['CONTADO', 'CREDITO'])->default('CONTADO');
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
            $table->string('id_baja')->nullable();
            $table->unsignedBigInteger('nota_credito_id')->nullable();
            $table->unsignedBigInteger('nota_debito_id')->nullable();
            $table->boolean('bienes_selva')->default(false);
            $table->boolean('servicios_selva')->default(false);
            $table->boolean('viewed')->default(false);
            $table->boolean('sent')->default(false);
            $table->longText('clase')->nullable();
            $table->unsignedBigInteger('local_id')->nullable()->index('ventas_local_id_foreign');
            $table->timestamps();


            $table->foreign(['cliente_id'])->references(['id'])->on('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['tipo_comprobante_id'])->references(['codigo'])->on('tipo_comprobantes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
