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
            $table->id();
            $table->unsignedBigInteger('prescription_id');
            $table->foreign('prescription_id')->references('presc_id')->on('prescriptions');
            $table->unsignedBigInteger('medication_id');
            $table->foreign('medication_id')->references('medic_id')->on('medications');
            $table->string('dosage');
            $table->string('frequency');
            $table->string('instructions');
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
