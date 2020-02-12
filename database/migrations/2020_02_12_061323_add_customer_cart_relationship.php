<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerCartRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function(Blueprint $table) {
            $table->index(["cart_id"], 'FK_RELATIONSHIP_51');

            $table->foreign('cart_id', 'FK_RELATIONSHIP_51')
                ->references('id')->on('cart')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('cart', function(Blueprint $table) {
            $table->index(["customer_id"], 'FK_RELATIONSHIP_60');

            $table->foreign('customer_id', 'FK_RELATIONSHIP_60')
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
        //
    }
}
