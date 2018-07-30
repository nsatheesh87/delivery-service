<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pigeon_id')->unsigned();
            $table->integer('distance');
            $table->integer('deadline');
            $table->integer('cost');
            $table->enum('status', ['new', 'in-progress', 'completed'])->default('new');
            $table->foreign('pigeon_id')->references('id')->on('pigeon');
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
        Schema::dropIfExists('orders');
    }
}
