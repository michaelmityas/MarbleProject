<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSawnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sawn', function (Blueprint $table) {
            $table->bigIncrements('sawn_id');
            $table->integer('block_id');
            
            $table->double('t_length')->default(0); //طول الطاولة
            $table->double('t_width')->default(0);  //عرض الطاولة
            
            //ده مالوش استخدام علشان هشتغل علي الطاولات ال2سم و ال3سم بس
            //$table->double('thickness'); //سمك الطاولة
            
            $table->integer('count_2cm'); // عدد الطاولات 2 سم
            $table->integer('count_3cm'); //عدد الطاولات 3 سم
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
        Schema::dropIfExists('sawn');
    }
}
