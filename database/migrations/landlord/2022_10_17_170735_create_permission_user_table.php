<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    public function up()
    {
        Schema::create("permission_user", function (Blueprint $table) {
            $table->uuid('permission_id')->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->uuid('user_id')->index();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("permission_user");
    }

}
