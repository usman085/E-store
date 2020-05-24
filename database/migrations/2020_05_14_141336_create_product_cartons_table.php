<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCartonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cartons', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name');
            $table->integer('pro_type')->nullable();
            $table->string('pro_brand')->nullable();
            $table->string('pro_bar_code')->nullable();
            $table->double('pro_retail_price_per_piece')->nullable();
            $table->double('pro_retail_price_carton')->nullable();
            $table->double('pro_whole_sale_price_per_piece')->nullable();
            $table->double('pro_whole_sale_price_carton')->nullable();
            $table->double('pro_purchase_price_per_piece')->nullable();
            $table->double('pro_purchase_price_carton')->nullable();
            $table->double('pro_total_piece_in_carton')->nullable();
            $table->integer('pro_shop_id')->nullable();
            $table->integer('add_or_changeBy')->nullable();
            $table->double('pro_size')->nullable();
            $table->double('pro_gram')->nullable();
            $table->double('pro_dozen_sale_price')->nullable();
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
        Schema::dropIfExists('product_cartons');
    }
}
