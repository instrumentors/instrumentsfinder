<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('order_id')->default("0000");
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('enquiry_desc')->nullable();
            $table->string('reseller_price')->default("N");
            $table->string('bulk_price')->default("N");
            $table->string('country_shipping')->default("N");

            $table->string('country')->default("N");
            $table->string('country_code')->default("N");
            $table->string('country_flag')->default("N");
            $table->string('country_emoji')->default("N");
            $table->string('city')->default("N");
            $table->string('lat')->default("N");
            $table->string('lon')->default("N");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
