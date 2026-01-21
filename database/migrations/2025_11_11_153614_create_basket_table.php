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
        Schema::create('basket', function (Blueprint $table) {
            $table->id()->comment('ID записи в корзине');
            $table->timestamps();

            // Поля для связки с пользователем и товаром
            $table->unsignedBigInteger('user_id')->nullable()->comment('ID пользователя');
            $table->unsignedBigInteger('product_id')->nullable()->comment('ID товара');

            // Внешний ключ на таблицу users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Внешний ключ на таблицу products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Уникальный индекс, чтобы не было дублей
            $table->unique(['user_id', 'product_id']);
        });
        // Можно добавить комментарий к таблице, если нужно
        // DB::statement("COMMENT ON TABLE \"basket\" IS 'Корзина покупок'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket');
    }
};