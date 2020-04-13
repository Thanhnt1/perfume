<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_property', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('property_id');
            $table->string('value', 100)->nullable()->default(null);
            $table->timestamps();
            
            $table->index('value');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('property_id')
                ->references('id')->on('properties')
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
        Schema::dropIfExists('product_property');
    }
}
