<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('sale_id');
            $table->unsignedInteger('product_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["product_id"], 'FK_PRODUCT_SALE_KM2');


            $table->foreign('sale_id', 'product_sale_sale_id')
                ->references('id')->on('sales')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('product_id', 'FK_PRODUCT_SALE_KM2')
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
        Schema::dropIfExists('product_sale');
    }
}
