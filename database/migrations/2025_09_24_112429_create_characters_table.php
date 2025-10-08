<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('hp')->default(100);
            $table->integer('mp')->default(50);
            $table->integer('attack')->default(10);
            $table->integer('defense')->default(5);
            $table->integer('special_attack')->default(15);
            $table->integer('special_defense')->default(5);
            $table->integer('speed')->default(10);
            $table->integer('exp')->default(0);
            $table->integer('level')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
