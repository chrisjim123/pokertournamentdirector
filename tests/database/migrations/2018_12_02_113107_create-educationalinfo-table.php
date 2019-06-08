<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educationalinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id');
            $table->text('elem_school'); 
            $table->text('elem_sy');
            $table->text('highschool');
            $table->text('hs_sy');    
            $table->text('college');
            $table->text('college_sy');   
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
        Schema::dropIfExists('educationalinfo');
    }
}
