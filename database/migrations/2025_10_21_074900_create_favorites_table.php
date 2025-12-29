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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id()->comment('ID понравившегося товра (связка пользователь-товар)');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable()->after('id')->comment('ID пользователя');
            $table->unsignedBigInteger('product_id')->nullable()->after('id')->comment('ID товара');

            // внешний ключ на user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // внешний ключ на products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // Уникальный индекс для предотвращения дублирования
            $table->unique(['user_id', 'product_id']);
        });
        // DB::statement("COMMENT ON TABLE \"favorites\" IS 'Избранное'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
