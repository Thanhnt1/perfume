<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('phone', 11)->nullable()->default(null);
            $table->string('sex')->nullable()->default(null);
            $table->rememberToken();
            $table->string('avatar_url')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(["role_id"], 'FK_RELATIONSHIP_22');

            $table->foreign('role_id', 'FK_RELATIONSHIP_22')
                ->references('id')->on('roles')
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
        Schema::dropIfExists('admin');
    }
}
