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
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // 'weekly' or 'private'
        $table->date('date');
        $table->time('time');
        $table->integer('max_players');
        $table->integer('registered_players')->default(0);
        $table->string('status')->default('pending'); // pending, confirmed, cancelled
        $table->decimal('price', 8, 2)->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
