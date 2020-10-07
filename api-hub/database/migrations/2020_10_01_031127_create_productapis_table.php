<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productapis', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->integer('reference');
            $table->double('price', 8, 2);
            $table->string('friendly_url');
            $table->integer('ean')->nullable();
            $table->integer('upc')->nullable();
            $table->boolean('active');
            $table->boolean('visibility');
            $table->string('condition');
            $table->boolean('available_for_order');
            $table->boolean('show_price');
            $table->boolean('available_online_only');
            $table->string('short_description');
            $table->longText('description');
            $table->double('wholesale_price', 8, 2);
            $table->double('unit_price', 8, 2)->nullable();
            $table->double('special_price', 8, 2)->nullable();
            $table->date('special_price_start_date')->nullable();
            $table->date('special_price_end_date')->nullable();
            $table->boolean('on_sale');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image_url');
            $table->integer('quantity');
            $table->boolean('out_of_stock');
            $table->integer('minimal_quantity');
            $table->date('product_available_date');
            $table->string('text_when_stock');
            $table->string('text_when_backorder_allowed');
            $table->string('category');
            $table->integer('default_category_id');
            $table->double('width', 5,3);
            $table->double('height', 5,3);
            $table->double('depth', 5,3);
            $table->double('weight', 5,3);
            $table->double('additional_shipping', 8,2)->nullable();
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
        Schema::dropIfExists('productapis');
    }
}
