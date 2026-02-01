<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
       Schema::create('reservations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('weekly_game_id')->constrained()->onDelete('cascade');
    $table->string('reserved_by_name');
    $table->string('email');
    $table->string('phone');
    $table->integer('number_of_players');
    $table->json('player_names')->nullable(); // Store as JSON array
    $table->enum('payment_method', ['cash', 'clique'])->default('cash');
    $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
    $table->text('special_requests')->nullable();
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};