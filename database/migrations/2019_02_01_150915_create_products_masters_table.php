<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsMastersTable extends Migration
{

    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_master', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->default('');
            $table->string('brand')->default('');
            $table->integer('prod_id')->default(0);
            $table->bigInteger('source_prod_id')->default(0);
            $table->string('seo_title')->default('')->nullable();
            $table->text('seo_desc')->nullable();
            $table->string('cat1')->default('')->nullable();
            $table->string('cat2')->default('')->nullable();
            $table->string('cat3')->default('')->nullable();
            $table->string('cat4')->default('')->nullable();
            $table->string('cat5')->default('')->nullable();
            $table->float('listprice')->default(0)->nullable();
            $table->float('startingprice')->default(0)->nullable();
            $table->string('img')->default('')->nullable();
            $table->text('short_desc')->nullable();
            $table->longtext('long_desc')->nullable();
            $table->text('features')->nullable();
            $table->string('stock')->default('')->nullable();
            $table->string('url')->default('')->nullable();
            $table->integer('options_count')->default(0)->nullable();
            $table->boolean('showcodes')->default(false)->nullable();
            $table->boolean('is_code_fixed')->default(false)->nullable();
            $table->string('codevalue')->default('')->nullable();
            $table->unique(['prod_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_masters');
    }
}
