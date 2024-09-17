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
        Schema::create('cart', function (Blueprint $table) {
            $table->string('patient_id', 5);
            $table->string('drug_id', 5);
            $table->integer('qty');
            $table->string('price', 10);
            $table->string('total', 10);
            $table->timestamps();

            // Foreign keys
            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('drug_id')->references('id')->on('drug');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
