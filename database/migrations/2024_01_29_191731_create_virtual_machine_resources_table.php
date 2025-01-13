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
        Schema::create('virtual_machine_resources', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('name');
            $table->unsignedBigInteger('quantity');
            $table->enum('unit', ['units', 'bytes']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_machine_resources');
    }
};
