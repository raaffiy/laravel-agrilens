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
        Schema::create('moduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->text('benefits')->nullable();
            $table->text('planting_steps')->nullable();
            $table->text('care_tips')->nullable();
            $table->string('difficulty')->default('Pemula'); // Pemula, Menengah, Mahir
            $table->integer('harvest_days')->default(60); // Estimasi panen (hari)
            $table->date('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduls');
    }
};
