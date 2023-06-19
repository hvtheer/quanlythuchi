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
        Schema::create('temporary_residence_and_absence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personId');
            $table->unsignedBigInteger('householdId');
            $table->date('startDate')->default(now());
            $table->date('endDate')->nullable();
            $table->string('reason');
            $table->string('tempAbsenceAddress')->nullable();
            $table->timestamps();

            $table->foreign('personId')->references('id')->on('persons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('householdId')->references('id')->on('households')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_residence__and_absence');
    }
};
