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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->unsignedBigInteger('doc_user_id');
            $table->foreign('doc_user_id')->references('id')->on('users');
            $table->string('doc_contact')->nullable();
            $table->string('specialization');
            $table->string('qualification');
            $table->date('housejob_start_date');
            $table->string('experience')->nullable();
            $table->integer('charges')->nullable();
            $table->string('working_days')->nullable();
            $table->string('timings')->nullable();
            $table->string('doc_gender')->nullable();
            $table->string('doc_address')->nullable();
            $table->date('doc_DOB')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
