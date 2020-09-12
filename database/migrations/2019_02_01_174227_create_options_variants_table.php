<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_variants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('option_id');
            $table->integer('variant_id');
            $table->string('code')->nullable();
            $table->text('variant_desc')->nullable();
            $table->float('listprice')->default(0);
            $table->float('cost')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_variants');
    }
}
