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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 15, 2);
            $table->string('image')->nullable(true);
            $table->smallInteger('beds')->nullable()->default(1);
            $table->smallInteger('baths')->nullable()->default(2);
            $table->string('sq_ft')->nullable();
            $table->enum('home_type', ['Home', 'Mansion', 'Palace'])->default('Home');
            $table->enum('type', ['Sale', 'Lease', 'Rent'])->default('Rent');
            $table->integer('year_built')->nullable()->default(2000);
            $table->string('price_sqft')->nullable()->default('9999');
            $table->string('more_info', 512)->nullable();
            $table->string('location', 40)->nullable();
            $table->string('agent_name')->nullable()->default('Mr.Demon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
