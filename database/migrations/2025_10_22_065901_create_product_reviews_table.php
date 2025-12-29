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
            Schema::create('product_reviews', function (Blueprint $table) {
            $table->id()->comment('ID комментария');
            $table->unsignedBigInteger('product_id')->comment('ID товара'); 
            $table->unsignedBigInteger('user_id')->comment('ID пользователя');    
            $table->integer('rating')->nullable()->comment('Оценка (например, от 1 до 5)');
            $table->text('comment')->nullable()->comment('Текст комментария');
            $table->timestamps(); // без comment()

            // Внешние ключи
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Индексы для быстрого поиска
            $table->index(['product_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
