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
        Schema::create('catalago_digemid', function (Blueprint $table) {
            $table->id();
            $table->text('Cod_Prod');
            $table->text('Nom_Prod');
            $table->text('Concent');
            $table->text('Nom_Form_Farm');
            $table->text('Nom_Form_Farm_Simplif');
            $table->text('Presentac');
            $table->text('Fracciones');
            $table->text('Fec_Vcto_Reg_Sanitario');
            $table->text('Num_RegSan');
            $table->text('Nom_Titular');
            $table->text('Situacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalago_digemid');
    }
};
