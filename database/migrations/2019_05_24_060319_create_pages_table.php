<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name_en', 255);
            $table->string('name_ar', 255);
            $table->string('meta_title_en', 255);
            $table->string('meta_title_ar', 255);
            $table->string('meta_desc_en', 255);
            $table->string('meta_desc_ar', 255);
            $table->string('meta_keyword_en', 255);
            $table->string('meta_keyword_ar', 255);
            $table->string('slug', 255);
            $table->longText('content_en', 255);
            $table->longText('content_ar', 255);            
            $table->enum('status', [0,1])->default(1)->comment('0: inactive, 1: active (default value)');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
