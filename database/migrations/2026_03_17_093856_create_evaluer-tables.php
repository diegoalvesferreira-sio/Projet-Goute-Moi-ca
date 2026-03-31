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
        Schema::create('evaluer', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('visite_id');
    $table->unsignedBigInteger('critere_id');
    $table->integer('note');
    $table->foreign('visite_id')->references('id')->on('visites')->onDelete('cascade');
    $table->foreign('critere_id')->references('id')->on('criteres')->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
