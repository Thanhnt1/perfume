<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_return', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('return_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity')->nullable()->default(null);
            $table->integer('type')->nullable()->default(null);
            $table->text('reason')->nullable()->default(null);
            $table->integer('status')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["return_id"], 'FK_PRODUCT_RETURN3');
            $table->index(["product_id"], 'FK_PRODUCT_RETURN2');


            $table->foreign('return_id', 'product_return_return_id')
                ->references('id')->on('returns')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('product_id', 'FK_PRODUCT_RETURN2')
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
        Schema::dropIfExists('product_return');
    }
}
