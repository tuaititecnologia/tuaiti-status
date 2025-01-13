<?php

use App\Models\Client;
use App\Models\Datacenter;
use App\Models\Node;
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
        Schema::create('virtual_machines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Datacenter::class);
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Node::class);
            $table->string('machine_id')->nullable();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_machines');
    }
};
