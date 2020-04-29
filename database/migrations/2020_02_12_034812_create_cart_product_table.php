<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity')->nullable(0)->default(null);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["cart_id"], 'FK_CART_PRODUCT_1');
            
            $table->index(["product_id"], 'FK_CART_PRODUCT_2');

            $table->foreign('cart_id', 'FK_CART_PRODUCT_1')
                ->references('id')->on('cart')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('product_id', 'FK_CART_PRODUCT_2')
                ->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}
