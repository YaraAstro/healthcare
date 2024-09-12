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
        Schema::create('prescription', function (Blueprint $table) {
            $table->string('id', 5)->primary()->unique()->check('id LIKE \'PR%\'');
            $table->string('patient_id', 5);
            $table->string('doctor_id', 5);
            $table->string('appo_id', 5);
            $table->string('payment_id', 5)->nullable();
            $table->text('drugs'); // Array of drug ids as a string
            $table->string('amount', 10)->nullable();
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->timestamp('date')->useCurrent();

            $table->foreign('appo_id')->references('id')->on('appointment');
            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('doctor_id')->references('id')->on('doctor');
            $table->foreign('payment_id')->references('id')->on('payment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription');
    }
};
