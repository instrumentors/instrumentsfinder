<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoryMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger("prod_id");
            $table->integer("accessory_id");
            $table->string("accessory_type");

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessory_masters');
    }
}
