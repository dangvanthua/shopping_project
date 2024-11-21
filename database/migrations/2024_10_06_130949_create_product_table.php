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

            $table->increments('id_product');
            $table->string('product_name');
            $table->integer('id_category');
            $table->text('product_desc');
            $table->text('product_content');
            $table->string('product_price');
            $table->string('product_image');
            $table->boolean('hot')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('product_quantity')->default(0);
            $table->integer('product_status');
            $table->fullText(['product_name', 'product_desc']);
            $table->integer('discounted_price')->default(0);
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
