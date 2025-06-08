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
        Schema::create('health_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_id')->cascadeOnDelete();
            $table->string('address');
            $table->foreignId('district_id')->cascadeOnDelete();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('kdppk')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_facilities');
    }
};
