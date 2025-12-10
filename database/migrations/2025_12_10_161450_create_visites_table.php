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
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
             $table->date('date_visite');
            $table->date('date_publication')->nullable();
            $table->text('commentaire')->nullable();
            $table->unsignedBigInteger('critique_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('critique_id')->references('id')->on('critiques')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
