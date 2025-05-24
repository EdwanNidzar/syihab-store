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
        Schema::create('gsk_hp_seconds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gsk_tipe_id');
            $table->string('storage')->nullable();
            $table->string('condition')->nullable();
            $table->string('qualification')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();

            $table->foreign('gsk_tipe_id')->references('id')->on('gsk_tipes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gsk_hp_seconds');
    }
};
