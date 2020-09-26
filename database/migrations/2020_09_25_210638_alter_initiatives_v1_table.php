<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInitiativesV1Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('initiatives', function($table) {
            $table->text('years')->nullable();
            $table->text('objective_en')->nullable();
            $table->text('objective_ar')->nullable();
            $table->string('url_title2_en')->nullable();
            $table->string('url_title2_ar')->nullable();
            $table->text('url2')->nullable();
            $table->string('url_title3_en')->nullable();
            $table->string('url_title3_ar')->nullable();
            $table->text('url3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('initiatives', function($table) {
            $table->dropColumn('years');
            $table->dropColumn('objective_en');
            $table->dropColumn('objective_ar');
            $table->dropColumn('url_title2_en');
            $table->dropColumn('url_title2_ar');
            $table->dropColumn('url2');
            $table->dropColumn('url_title3_en');
            $table->dropColumn('url_title3_ar');
            $table->dropColumn('url3');
        });
    }

}
