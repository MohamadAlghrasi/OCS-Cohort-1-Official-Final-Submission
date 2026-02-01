<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('game_id')->constrained()->onDelete('cascade');
        $table->string('reserved_by_name');
        $table->string('email');
        $table->string('phone');
        $table->integer('number_of_players')->default(1);
        $table->decimal('total_price', 8, 2)->nullable();
        $table->string('payment_method'); // cash, clique
        $table->text('special_requests')->nullable();
        $table->string('status')->default('pending'); // pending, confirmed, cancelled
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
