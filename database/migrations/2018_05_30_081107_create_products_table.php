<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('code');
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->string('name');
            $table->string('price');
            $table->string('price_promotion');
            $table->string('free_stock');
            $table->string('featured');
            $table->string('condition');
            $table->string('branch');
            $table->string('image_featured');
            $table->string('gallery');
            $table->longText('detail');
            $table->integer('review_count');
            $table->float('rating');
            $table->longText('description');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tag');
            $table->string('keywords');
            $table->boolean('active');
            $table->string('slug');
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
