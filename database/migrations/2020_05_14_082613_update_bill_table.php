<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->integer('total_price')->nullable()->default(null)->change();
            $table->integer('total_discount')->nullable()->default(null)->change();
            $table->integer('status')->nullable()->default(0)->change();
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
            $table->float('total_price')->nullable()->default(null)->change();
            $table->float('total_discount')->nullable()->default(null)->change();
            $table->integer('status')->default()->change();
        });
    }
}
