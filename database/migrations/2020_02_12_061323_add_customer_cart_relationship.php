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
        // Schema::table('customer', function(Blueprint $table) {
        //     $table->foreign('cart_id')
        //         ->references('id')->on('cart')
        //         ->onDelete('restrict')
        //         ->onUpdate('restrict');
        // });

        Schema::table('cart', function(Blueprint $table) {
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
        // Schema::table('customer', function(Blueprint $table) {
        //     $table->dropForeign('customer_cart_id_foreign');
        // });

        Schema::table('cart', function(Blueprint $table) {
            $table->dropForeign('cart_customer_id_foreign');
        });
    }
}
