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
        Schema::create('pigeons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('speed');
            $table->integer('range');
            $table->integer('cost');
            $table->integer('downtime');
            $table->enum('availability', ['0', '1'])->default('1');
            $table->integer('rest_count')->default('0');
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
        Schema::dropIfExists('pigeons');
    }
}
