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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable()->default(null);
            $table->unsignedInteger('supplier_id')->nullable()->default(null);
            $table->unsignedInteger('unit_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->integer('status')->nullable()->default(null);
            $table->integer('quantity')->nullable()->default(null);
            $table->float('import_price')->nullable()->default(null);
            $table->float('selling_price')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
            $table->date('import_date')->nullable()->default(null);
            $table->integer('rate')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["supplier_id"], 'FK_RELATIONSHIP_18');

            $table->index(["category_id"], 'FK_RELATIONSHIP_13');

            $table->index(["unit_id"], 'FK_RELATIONSHIP_16');


            $table->foreign('category_id', 'FK_RELATIONSHIP_13')
                ->references('category_id')->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('unit_id', 'FK_RELATIONSHIP_16')
                ->references('id')->on('units')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('supplier_id', 'FK_RELATIONSHIP_18')
                ->references('id')->on('suppliers')
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
        Schema::dropIfExists('products');
    }
}