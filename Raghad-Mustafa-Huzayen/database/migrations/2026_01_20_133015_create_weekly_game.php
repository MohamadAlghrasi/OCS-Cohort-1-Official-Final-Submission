<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('weekly_games', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('time');
            $table->string('location');
            $table->integer('max_players');
            $table->integer('current_players')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weekly_games');
    }
};