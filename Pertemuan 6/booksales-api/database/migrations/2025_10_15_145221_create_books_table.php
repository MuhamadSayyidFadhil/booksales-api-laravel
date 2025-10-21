<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->string('cover_photo')->nullable();
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
