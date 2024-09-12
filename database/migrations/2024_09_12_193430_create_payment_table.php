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
        Schema::create('payment', function (Blueprint $table) {
            $table->string('id', 5)->primary()->unique()->check('id LIKE \'PY%\'');
            $table->string('patient_id', 5);
            $table->string('appo_id', 5)->nullable(); // Made nullable for consistency
            $table->string('name_on_card', 100)->nullable();
            $table->string('cc_number', 20)->nullable();
            $table->string('amount', 10)->nullable();
            $table->enum('status', ['pending', 'success', 'declined'])->nullable();

            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('appo_id')->references('id')->on('appointment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
