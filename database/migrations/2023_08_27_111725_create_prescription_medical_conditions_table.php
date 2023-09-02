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
        Schema::create('prescription_medical_conditions', function (Blueprint $table) {
            $table->id('pmc_id');
            $table->unsignedBigInteger('pmc_prescription_id');
            $table->foreign('pmc_prescription_id')->references('presc_id')->on('prescriptions');
            $table->unsignedBigInteger('pmc_medical_condition_id');
            $table->foreign('pmc_medical_condition_id')->references('condition_id')->on('medical_conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_medical_conditions');
    }
};
