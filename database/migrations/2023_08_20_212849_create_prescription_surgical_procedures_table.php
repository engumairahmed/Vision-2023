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
            $table->id();
            $table->unsignedBigInteger('prescription_id');
            $table->foreign('prescription_id')->references('presc_id')->on('prescriptions');
            $table->unsignedBigInteger('surgical_procedure_id');
            $table->foreign('surgical_procedure_id')->references('procedure_id')->on('surgical_procedures');            
            $table->string('instructions');
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
