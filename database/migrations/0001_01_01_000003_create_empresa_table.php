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
        Schema::create('empresa', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('tipo_documento')->nullable();
            $table->text('razon_social');
            $table->text('nombre_comercial')->nullable();
            $table->text('nombre_web')->nullable();
            $table->text('ruc');
            $table->text('logo')->nullable();
            $table->text('banner')->nullable();
            $table->text('direccion')->nullable();
            $table->text('telefono')->nullable();
            $table->text('correo')->nullable();
            $table->text('pais')->nullable();
            $table->text('sunat_datos')->nullable();
            $table->text('cuenta_detraccion')->nullable();
            $table->enum('modo', ['produccion', 'local'])->default('local');
            $table->boolean('afecto_igv')->default(true);
            $table->text('mail_config')->nullable();
            $table->boolean('bienes_selva')->default(false);
            $table->boolean('servicios_selva')->default(false);
            $table->text('ruta_xml')->nullable();
            $table->text('ruta_cdr')->nullable();
            $table->text('ruta_cert')->nullable();
            $table->text('igv')->nullable();
            $table->text('icbper')->nullable();
            $table->text('terminos')->nullable();
            $table->text('extra')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantilla');
    }
};
