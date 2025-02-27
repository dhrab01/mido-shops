<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosucts_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('size');
            $table->float('price');
            $table->integer('stock');
            $table->string('sku');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('prosucts_attributes');
    }
};
