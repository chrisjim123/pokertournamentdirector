<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('governmentinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id');
            $table->text('sss_number'); 
            $table->text('philhealth_number');
            $table->text('tin_number'); 
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
        Schema::dropIfExists('governmentinfo');
    }
}
