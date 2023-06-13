<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id'); //tag id
            $table->integer('taggable_id'); //video_id
            $table->string('taggable_type'); // model
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('taggables');
    }
}
