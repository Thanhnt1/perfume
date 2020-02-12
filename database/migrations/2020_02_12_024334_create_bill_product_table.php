<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('bill_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["bill_id"], 'FK_BILL_PRODUCT3');

            $table->index(["product_id"], 'FK_BILL_PRODUCT2');

            $table->foreign('bill_id', 'bill_product_bill_id')
                ->references('id')->on('bills')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('product_id', 'FK_BILL_PRODUCT2')
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
        Schema::dropIfExists('bill_product');
    }
}
