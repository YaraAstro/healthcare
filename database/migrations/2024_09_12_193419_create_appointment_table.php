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
        Schema::create('appointment', function (Blueprint $table) {
            $table->string('id', 5)->primary()->unique()->check('id LIKE \'AP%\'');
            $table->text('symptoms')->nullable();
            $table->text('description')->nullable();
            $table->string('patient_id', 5);
            $table->string('doctor_id', 5);
            $table->date('date');
            $table->enum('status', ['pending', 'approve', 'reject', 'done'])->default('pending');

            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('doctor_id')->references('id')->on('doctor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
