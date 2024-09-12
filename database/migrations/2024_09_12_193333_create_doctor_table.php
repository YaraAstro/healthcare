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
        Schema::create('doctor', function (Blueprint $table) {
            $table->string('id', 5)->primary()->unique()->check('id LIKE \'DC%\'');
            $table->string('username', 50)->unique();
            $table->string('name')->nullable();
            $table->string('speciality')->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor');
    }
};
