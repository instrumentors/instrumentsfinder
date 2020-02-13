<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer("cat_id");
            $table->bigInteger("prod_id");
            $table->string("name");
            $table->string("slug");
            $table->string("cat_parent");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_masters');
    }
}
