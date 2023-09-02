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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('patient_id');
            $table->unsignedBigInteger('pat_user_id');
            $table->foreign('pat_user_id')->references('id')->on('Users');
            $table->string('father_name')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('pat_gender')->nullable();
            $table->string('pat_address')->nullable();
            $table->string('pat_contact')->nullable();
            $table->date('pat_DOB')->nullable();
            $table->string('blood_group')->nullable();
            $table->timestamps(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
