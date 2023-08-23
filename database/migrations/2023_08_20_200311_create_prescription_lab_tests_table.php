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
        Schema::create('prescription_lab_tests', function (Blueprint $table) {
            $table->id('pres_lab_id');
            $table->unsignedBigInteger('prescription_id');
            $table->foreign('prescription_id')->references('presc_id')->on('prescriptions');
            $table->unsignedBigInteger('lab_test_id');
            $table->foreign('lab_test_id')->references('lab_id')->on('lab_tests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_lab_tests');
    }
};
