<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillRelationshipInBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign('FK_RELATIONSHIP_15');
            $table->dropColumn('shipping_department_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->unsignedInteger('shipping_department_id')->nullable()->default(null)->after('customer_id');

            $table->foreign('shipping_department_id', 'FK_RELATIONSHIP_15')
                ->references('id')->on('shipping_department')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }
}
