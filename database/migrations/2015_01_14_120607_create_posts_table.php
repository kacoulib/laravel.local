<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('user_id')->unsigned()->nullable();
                        $table->string('title',50);
			$table->string('slug',50);
			$table->text('excerpt');
			$table->text('content');
			$table->string('link_thumbnail', 200);
			$table->integer('comments_count')->default(0);
			$table->enum('status', array('publish', 'unpublish', 'trash'))->default('unpublish');
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
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
		Schema::drop('posts');
	}

}
