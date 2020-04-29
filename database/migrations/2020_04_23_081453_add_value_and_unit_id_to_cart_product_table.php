<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValueAndUnitIdToCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->string('value')->nullable()->default(null)->after('product_id');
            $table->unsignedInteger('unit_id')->nullable()->default(null)->after('product_id');

            $table->foreign('unit_id')
                ->references('id')->on('units')
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
        Schema::table('cart_product', function (Blueprint $table) {
            $table->dropColumn('value');
            $table->dropForeign('cart_product_unit_id_foreign');
            $table->dropColumn('unit_id');
        });
    }
}
