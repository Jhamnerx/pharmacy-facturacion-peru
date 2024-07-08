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
        Schema::create('detalle_presupuestos', function (Blueprint $table) {
            $table->id('id');
            $table->text('producto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('descuento_type')->nullable();
            $table->text('codigo')->nullable();
            $table->text('unit')->nullable();
            $table->text('unit_name')->nullable();
            $table->string('codigo_afectacion')->nullable();
            $table->string('tipo_precio')->nullable();
            $table->decimal('valor_unitario', 11, 4);
            $table->decimal('precio_unitario', 11, 4);
            $table->boolean('afecto_icbper')->default(false);
            $table->decimal('icbper', 11, 4)->nullable();
            $table->decimal('total_icbper', 11, 4)->nullable();
            $table->string('porcentaje_igv')->nullable();
            $table->decimal('sub_total', 11, 4)->nullable();
            $table->decimal('cantidad', 15);
            $table->decimal('precio', 15)->nullable();
            $table->decimal('descuento', 15)->nullable();
            $table->decimal('descuento_val', 15)->nullable();
            $table->decimal('descuento_factor', 11, 5)->nullable();
            $table->decimal('igv', 15)->nullable();
            $table->decimal('total', 15);
            $table->unsignedBigInteger('presupuestos_id')->nullable()->index('detalle_presupuestos_presupuestos_id_foreign');
            $table->unsignedBigInteger('producto_id')->nullable()->index('detalle_presupuestos_producto_id_foreign');
            $table->unsignedBigInteger('local_id')->nullable()->index('detalle_presupuestos_local_id_foreign');
            $table->timestamps();

            $table->foreign(['local_id'])->references(['id'])->on('locales')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['presupuestos_id'])->references(['id'])->on('presupuestos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['producto_id'])->references(['id'])->on('productos')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_presupuestos');
    }
};
