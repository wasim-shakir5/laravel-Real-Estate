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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 50);
            $table->string('email', 50);
            $table->string('subject', 128);
            $table->text('message')->nullable(true);
            $table->string('ip_address', 45);
            $table->string('user_agent', 255);
            $table->string('device_type', 20);
            $table->string('browser_type', 20);
            $table->string('os_type', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
