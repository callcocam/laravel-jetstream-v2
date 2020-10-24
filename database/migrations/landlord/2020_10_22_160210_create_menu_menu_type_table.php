<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuMenuTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_menu_type', function (Blueprint $table) {
            $table->uuid('menu_id')->index();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->uuid('menu_type_id')->index();
            $table->foreign('menu_type_id')->references('id')->on('menu_types')->onDelete('cascade');
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
        Schema::dropIfExists('menu_menu_type');
    }
}
