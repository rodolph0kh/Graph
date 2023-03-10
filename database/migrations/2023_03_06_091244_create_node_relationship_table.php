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
        Schema::create('node_relationship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('node_id')->constrained('nodes')->onUpdate('cascade');
            $table->foreignId('relationship_id')->constrained('relationships')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('node_relationship');
    }
};
