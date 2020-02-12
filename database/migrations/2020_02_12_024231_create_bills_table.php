<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('customer_id')->nullable()->default(null);
            $table->unsignedInteger('shipping_deparment_id')->nullable()->default(null);
            $table->unsignedInteger('admin_id')->nullable()->default(null);
            $table->unsignedInteger('type_shipping_id')->nullable()->default(null);
            $table->float('total_price')->nullable()->default(null);
            $table->integer('payment_methods')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
            $table->integer('status');
            $table->float('total_discount')->nullable()->default(null);
            $table->date('shipping_date')->nullable()->default(null);
            $table->date('receive_date')->nullable()->default(null);
            $table->string('recipient_name', 60)->nullable()->default(null);
            $table->char('recipient_phone', 12)->nullable()->default(null);
            $table->string('recipient_address', 200)->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["customer_id"], 'FK_RELATIONSHIP_4');

            $table->index(["admin_id"], 'FK_RELATIONSHIP_14');

            $table->index(["shipping_deparment_id"], 'FK_RELATIONSHIP_15');

            $table->index(["type_shipping_id"], 'FK_RELATIONSHIP_30');


            $table->foreign('admin_id', 'FK_RELATIONSHIP_14')
                ->references('id')->on('admin')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('shipping_deparment_id', 'FK_RELATIONSHIP_15')
                ->references('id')->on('shipping_deparment')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('type_shipping_id', 'FK_RELATIONSHIP_30')
                ->references('id')->on('type_shipping')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('customer_id', 'FK_RELATIONSHIP_4')
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
        Schema::dropIfExists('bills');
    }
}
