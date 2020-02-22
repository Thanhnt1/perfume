<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->uuid('uuid');
            $table->unsignedInteger('bill_id')->nullable()->default(null);
            $table->unsignedInteger('shipping_department_id')->nullable()->default(null);
            $table->unsignedInteger('admin_id')->nullable()->default(null);
            $table->date('return_date')->nullable()->default(null);
            $table->date('receive_date')->nullable()->default(null);
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["bill_id"], 'FK_RELATIONSHIP_24');

            $table->index(["shipping_department_id"], 'FK_RELATIONSHIP_20');

            $table->index(["admin_id"], 'FK_RELATIONSHIP_17');


            $table->foreign('admin_id', 'FK_RELATIONSHIP_17')
                ->references('id')->on('admin')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('shipping_department_id', 'FK_RELATIONSHIP_20')
                ->references('id')->on('shipping_department')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('bill_id', 'FK_RELATIONSHIP_24')
                ->references('id')->on('bills')
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
        Schema::dropIfExists('returns');
    }
}
