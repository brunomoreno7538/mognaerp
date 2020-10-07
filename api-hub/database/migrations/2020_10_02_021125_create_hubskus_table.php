<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubskusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubskus', function (Blueprint $table) {
            $table->id();
            $table->integer('sku')->unique();
            $table->string('title');
            $table->unsignedBigInteger('partnerId');
            $table->integer('ean');
            $table->integer('amount');
            $table->float('price', 8, 2);
            $table->float('sellPrice', 8, 2);
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
        Schema::dropIfExists('hubskus');
    }
}
