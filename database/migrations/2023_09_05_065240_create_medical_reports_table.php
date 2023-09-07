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
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mr_prescription_id');
            $table->foreign('mr_prescription_id')->references('presc_id')->on('prescriptions');
            $table->string('mr_name');
            $table->string('mr_report');
            $table->unsignedBigInteger('mr_created_by');
            $table->foreign('mr_created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_reports');
    }
};
