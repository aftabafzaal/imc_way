

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiativesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('slug_en');
            $table->string('slug_ar');
            $table->string('where_en');
            $table->string('where_ar');
            $table->string('url_title')->nullable();
            $table->text('url')->nullable();
            $table->integer('project_id');
            $table->integer('department_id')->nullable();
            $table->integer('business_owner_id')->nullable();
            $table->text('brief_en')->nullable();
            $table->text('brief_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('initiatives');
    }

}
