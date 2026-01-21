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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('ID товра');
            $table->string('name')->comment('Название товара');
            $table->text('description')->nullable()->comment('Описание товара');
            $table->decimal('price', 10, 2)->comment('Цена товара');
            $table->string('image_url')->nullable()->comment('Ссылка на изображение');
            $table->timestamps();

        });
        // DB::statement("COMMENT ON TABLE \"products\" IS 'Товары'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
