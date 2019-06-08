<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('companyinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id');
            $table->text('company_name'); 
            $table->text('company_address');
            $table->text('company_telephone'); 
            $table->text('company_email');
            $table->text('start_date'); 
            $table->text('end_date'); 
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
        Schema::dropIfExists('companyinfo');
    }
}
