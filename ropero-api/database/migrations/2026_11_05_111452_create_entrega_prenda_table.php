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
        Schema::create('entrega_prenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prenda_id')->constrained()->restricOnDelete();
            $table->foreignId('entrega_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('cantidad');
            $table->unique(['entrega_id', 'prenda_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_prenda');
    }
};
