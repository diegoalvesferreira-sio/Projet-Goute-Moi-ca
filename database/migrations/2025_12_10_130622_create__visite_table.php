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
        Schema::create('_visite', function (Blueprint $table) {
            $table->id();
            $table->date('date_visite');
            $table->date('date_publication')->nullable();
            $table->text('commentaire')->nullable();
            $table->foreignId('critique_id')->constrained('critiques')->cascadeOnDelete();
            $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_viste');
    }
};
