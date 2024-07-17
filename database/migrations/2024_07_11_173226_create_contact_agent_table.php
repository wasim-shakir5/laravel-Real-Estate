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
        Schema::create('contact_agent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('user_id');
            $table->string('agent_name');
            $table->string('name', 30);
            $table->string('email', 50);
            $table->string('phone', 15);
            $table->text('message')->nullable(true);
            $table->timestamps();

            $table->foreign('property_id')->references('id')
                ->on('properties')->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_agent');
    }
};
