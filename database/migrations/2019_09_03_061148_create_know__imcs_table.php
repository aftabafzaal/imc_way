<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowImcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('know__imcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('newsdescription_en');
            $table->string('newsdescription_ar');
            $table->string('knowdescription_en');
            $table->string('knowdescription_ar');
            $table->string('photo1')->nullable();
            $table->string('video1')->nullable();
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
        Schema::dropIfExists('know__imcs');
    }
}
