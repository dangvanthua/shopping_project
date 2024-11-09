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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('name');
            $table->text('describe')->nullable();
            $table->boolean('hot')->default(0);
            $table->unsignedBigInteger('id_category');
            $table->string('images');
            $table->boolean('is_active')->default(1);
            $table->integer('number_of_purchases')->default(0);
            $table->integer('price');
            $table->integer('quantity_available');
            $table->integer('sale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
