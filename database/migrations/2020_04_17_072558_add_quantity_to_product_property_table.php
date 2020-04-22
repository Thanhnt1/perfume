<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityToProductPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_property', function (Blueprint $table) {
            $table->integer('quantity')->nullable()->default(0)->after('value');
            $table->unsignedInteger('unit_id')->after('property_id');

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
        Schema::table('product_property', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropForeign('product_property_unit_id_foreign');
            $table->dropColumn('unit_id');
        });
    }
}
