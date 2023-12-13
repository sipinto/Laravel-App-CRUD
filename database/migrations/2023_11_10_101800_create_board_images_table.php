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
        Schema::create('board_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boardId');
            $table->string('imgAdd');
            $table->string('imgName');
            $table->timestamps();

            $table->foreign('boardId')->references('id')->on('boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_images');
    }
};
