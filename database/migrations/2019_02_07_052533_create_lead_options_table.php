<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_options', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('order_id')->default("0000");
            $table->string('product_id')->default("0000");
            $table->string('option_id')->default("0000");
            $table->string('variant_id')->default("0000");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_options');
    }
}
