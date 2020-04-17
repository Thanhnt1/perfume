<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('product_id')->nullable()->default(null);
            $table->unsignedInteger('customer_id')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->integer('rate')->nullable()->default(4);
            $table->integer('like')->nullable()->default(null);
            $table->integer('quality')->nullable()->default(80);
            $table->boolean('choose')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('customer_id')
                ->references('id')->on('customer')
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
        Schema::dropIfExists('comments');
    }
}
