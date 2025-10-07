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
        Schema::create('ingredient', function (Blueprint $table) {
            $table->id()->comment('ID игредиента');
            $table->string('name')->comment('наименование ингредиента');
            $table->string('unit_of_measurement')->nullable()->comment('Единица измерения');
        });
        DB::statement("COMMENT ON TABLE \"ingredient\" IS 'ингредиент'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient');
    }
};
