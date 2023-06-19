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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('idCard')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->string('avatar')->nullable();
            $table->tinyInteger('gender')->comment('0:MALE;1:FEMALE');
            $table->string('email')->nullable();
            $table->string('numberPhone')->nullable();
            $table->string('ethnic');
            $table->string('nationality');
            $table->string('address');
            $table->string('occupation')->nullable();
            $table->string('educationLevel')->nullable();
            $table->tinyInteger('maritalStatus')->comment('0:SINGLE;1:MARRIED');
            $table->tinyInteger('status')->comment('0:ALIVE,1:DEAD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
