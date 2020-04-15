<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('reason');
            $table->double('amount', 8, 2)->unsigned();
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('deducts');
    }
}
