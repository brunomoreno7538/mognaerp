<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubstocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partnerId');
            $table->integer('quantity');
            $table->integer('cost');
            $table->unsignedBigInteger('stockLocalId');
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
        Schema::dropIfExists('hubstocks');
    }
}
