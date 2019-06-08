<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManpowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manpower', function (Blueprint $table) {
            $table->increments('id');
            $table->text('firstname');
            $table->text('middlename');
            $table->text('lastname');
            $table->text('email');
            $table->text('address');    
            $table->integer('contact');
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
        Schema::dropIfExists('manpower');
    }
}
