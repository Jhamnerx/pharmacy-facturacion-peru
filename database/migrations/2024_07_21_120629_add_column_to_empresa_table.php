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
        Schema::table('empresa', function (Blueprint $table) {
            $table->text('codigo_observacion_digemid')->nullable()->after('sunat_datos');
            $table->text('regimen_type')->nullable()->after('sunat_datos');
            $table->enum('soap_type', ['sunat', 'ose', 'qpse'])->default('sunat')->after('modo');
            $table->string('soap_url')->nullable()->after('soap_type');
            $table->text('guia_api_datos')->nullable()->after('soap_url');
            $table->text('sire_datos')->nullable()->after('guia_api_datos');
            $table->longText('qpse_datos')->nullable()->after('sire_datos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empresa', function (Blueprint $table) {
            //
        });
    }
};
