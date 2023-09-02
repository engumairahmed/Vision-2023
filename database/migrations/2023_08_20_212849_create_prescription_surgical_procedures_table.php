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
        Schema::create('prescription_surgical_procedures', function (Blueprint $table) {
            $table->id('psp_id');
            $table->unsignedBigInteger('psp_prescription_id');
            $table->foreign('psp_prescription_id')->references('presc_id')->on('prescriptions');
            $table->unsignedBigInteger('psp_procedure_id');
            $table->foreign('psp_procedure_id')->references('sp_id')->on('surgical_procedures');            
            $table->string('psp_instructions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_surgical_procedures');
    }
};
