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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->text('content');
            $table->string('comment_type');
            $table->integer('comment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
