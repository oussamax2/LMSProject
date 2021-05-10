<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastname');
            $table->string('website');
            $table->string('telephone');
            $table->string('picture');
            $table->string('shortDescription');
            $table->string('description');
            $table->string('fcburl');
            $table->string('twitturl');
            $table->string('linkdinurl');
            $table->string('dribbleurl');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
