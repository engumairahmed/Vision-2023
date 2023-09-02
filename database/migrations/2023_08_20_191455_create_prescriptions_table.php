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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('presc_id');
            $table->unsignedBigInteger('presc_user_id');
            $table->foreign('presc_user_id')->references('id')->on('Users');
            $table->string('plan_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('doctor_name')->nullable();
            $table->unsignedBigInteger('presc_doctor_id')->nullable();
            $table->foreign('presc_doctor_id')->references('doctor_id')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
