<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePigeonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigeon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('speed');
            $table->integer('range');
            $table->integer('cost');
            $table->integer('downtime');
            $table->enum('is_active', ['0', '1'])->default('1');
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
        Schema::dropIfExists('pigeon');
    }
}
