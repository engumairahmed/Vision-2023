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
        Schema::create('prescription_medications', function (Blueprint $table) {
            $table->id('pm_id');
            $table->unsignedBigInteger('pm_prescription_id');
            $table->foreign('pm_prescription_id')->references('presc_id')->on('prescriptions');
            $table->unsignedBigInteger('pm_medication_id');
            $table->foreign('pm_medication_id')->references('medic_id')->on('medications');
            $table->string('pm_frequency')->nullable();
            $table->string('pm_instructions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_medications');
    }
};
