<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaceofbirthToManpowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manpower', function (Blueprint $table) {
             $table->text('place_of_birth')->after('birthdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manpower', function (Blueprint $table) {
            $table->dropcolumn('place_of_birth');
        });
    }
}
