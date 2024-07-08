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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id');
            $table->text('codigo')->nullable();
            $table->text('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('forma_farmaceutica')->nullable();
            $table->text('presentacion')->nullable();
            $table->text('numero_registro_sanitario')->nullable();
            $table->text('laboratorio')->nullable();
            $table->string('stock_minimo')->nullable();
            $table->string('stock')->nullable();
            $table->boolean('afecto_icbper')->default(false);
            $table->boolean('estado')->default(true);
            $table->integer('ventas')->default(0);
            $table->string('divisa')->nullable();
            $table->enum('tipo', ['producto', 'servicio'])->default('producto');
            $table->text('tipo_afectacion')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable()->index('productos_categoria_id_foreign');
            $table->unsignedBigInteger('local_id')->nullable();
            $table->string('unit_code')->nullable()->index('productos_unit_code_foreign');
            $table->decimal('precio_unitario', 18, 4)->nullable();
            $table->decimal('precio_minimo', 18, 4)->nullable();
            $table->decimal('precio_blister', 18, 4)->nullable();
            $table->integer('cantidad_blister')->nullable();
            $table->decimal('precio_caja', 18, 4)->nullable();
            $table->integer('cantidad_caja')->nullable();
            $table->decimal('costo_unitario', 18, 4)->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->text('ubicacion')->nullable();
            $table->text('lote')->nullable();
            $table->text('codigo_digemid')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(['categoria_id'])->references(['id'])->on('categorias')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['unit_code'])->references(['codigo'])->on('units')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
