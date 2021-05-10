<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_tag', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('course_id')->unsigned();
            $table->unsignedInteger('tag_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('course_tag');
    }
}
