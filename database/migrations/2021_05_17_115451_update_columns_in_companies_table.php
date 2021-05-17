<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
           
                
            $table->string('lastname')->nullable()->change();
            $table->string('website')->nullable()->change();
            $table->string('telephone')->nullable()->change();
            $table->string('picture')->nullable()->change();
            $table->string('shortDescription')->nullable()->change();
            $table->string('description')->nullable()->change();
            $table->string('fcburl')->nullable()->change();
            $table->string('twitturl')->nullable()->change();
            $table->string('linkdinurl')->nullable()->change();
            $table->string('dribbleurl')->nullable()->change();
                  
                
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
