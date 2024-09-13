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
        Schema::create('drug', function (Blueprint $table) {
            $table->string('id', 5)->primary()->unique()->check('id LIKE \'MD%\'');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('img_path', 100)->nullable();
            $table->string('amount', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug');
    }
};
