<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingDepartmentRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_shipping', function(Blueprint $table) {
            $table->unsignedInteger('shipping_department_id')->nullable()->default(null)->after('id');

            $table->foreign('shipping_department_id')
                ->references('id')->on('shipping_department')
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
        Schema::table('type_shipping', function(Blueprint $table) {
            $table->dropForeign('type_shipping_shipping_department_id_foreign');
            $table->dropColumn('shipping_department_id');
        });
    }
}
