<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_type');
            $table->bigInteger('block_tall');
            $table->bigInteger('block_width');
            $table->bigInteger('block_height');
            $table->string('block_type');
            $table->bigInteger('work_amount');
            $table->bigInteger('slice_num');
            $table->bigInteger('cm');
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
        Schema::dropIfExists('works');
    }
}
