<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50);
            $table->string('email', 120);
            $table->integer('post_id')->unsigned();
            $table->text('content');
            $table->text('number');
            $table->text('pays');
            $table->enum('status', array('publish', 'unpublish', 'dash'))->default('unpublish');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('comments');
    }

}
