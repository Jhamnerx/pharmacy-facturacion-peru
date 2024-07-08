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
            $table->string('tipo_comprobante_id')->nullable();
            $table->unsignedBigInteger('clientes_id')->nullable();
            $table->string('numero')->nullable();
            $table->string('correlativo');
            $table->string('serie');
            $table->string('serie_correlativo');
            $table->date('fecha');
            $table->date('fecha_caducidad');
            $table->string('divisa')->default('PEN');
            $table->decimal('tipo_cambio', 11)->nullable();
            $table->string('metodo_pago_id')->nullable();
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
            $table->decimal('igv', 11, 4)->nullable();
            $table->decimal('comision', 11, 4)->nullable();
            $table->decimal('adelanto', 15, 4)->default(0);
            $table->string('numero_cuotas')->nullable();
            $table->string('vence_cuotas')->nullable();
            $table->text('detalle_cuotas')->nullable();
            $table->enum('anulado', ['si', 'no'])->default('no');
            $table->enum('resumen', ['si', 'no'])->default('no');
            $table->enum('pago_estado', ['UNPAID', 'PAID'])->default('UNPAID');
            $table->enum('forma_pago', ['CONTADO', 'CREDITO'])->default('CONTADO');
            $table->decimal('sub_total', 10)->nullable();
            $table->decimal('impuesto', 10)->nullable();
            $table->decimal('total', 10)->nullable();
            $table->decimal('sub_total_soles', 10)->nullable();
            $table->decimal('impuesto_soles', 10)->nullable();
            $table->decimal('total_soles', 10)->nullable();
            $table->decimal('tipoCambio', 10, 3)->nullable();
            $table->decimal('igv_soles', 11)->nullable();
            $table->decimal('op_inafectas_soles', 11)->nullable();
            $table->decimal('op_exoneradas_soles', 11)->nullable();
            $table->decimal('op_gravadas_soles', 11)->nullable();
            $table->decimal('descuento_soles', 11)->nullable();
            $table->enum('estado', ['0', '1', '2'])->default('0');
            $table->boolean('features')->default(false);
            $table->string('nota')->nullable();
            $table->text('terminos')->nullable();
            $table->unsignedBigInteger('local_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign(['tipo_comprobante_id'], 'fk_tipo_c_presupuesto')->references(['codigo'])->on('tipo_comprobantes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['clientes_id'])->references(['id'])->on('clientes')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('cascade');
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
