<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('brand_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->integer('product_price');
            $table->integer('product_code');
            $table->longText('short_describtion');
            $table->longText('long_describtion');
            $table->integer('product_quantity');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
