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
        Schema::create('virtual_machine_statuses', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('virtual_machine_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('type');
            $table->string('value');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_machine_statuses');
    }
};
