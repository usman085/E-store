<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_bags', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name');
            $table->string('pro_brand')->nullable();
            $table->integer('pro_type')->nullable();
            $table->string('pro_bar_code')->nullable();
            $table->double('pro_retail_price_per_kg')->nullable();
            $table->double('pro_retail_price_bag')->nullable();
            $table->double('pro_whole_sale_price_per_kg')->nullable();
            $table->double('pro_whole_sale_price_bag')->nullable();
            $table->double('pro_purchase_price_per_kg')->nullable();
            $table->double('pro_purchase_price_bag')->nullable();
            $table->double('pro_total_weight_in_bag')->nullable();
            $table->integer('pro_shop_id')->nullable();
            $table->integer('add_or_changeBy')->nullable();
            
            
            
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
        Schema::dropIfExists('product_bags');
    }
}
