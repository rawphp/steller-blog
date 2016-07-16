<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePostsTable
 */
class CreatePostsTable extends Migration
{
    const TABLE = 'posts';

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('blog_id')->references('id')->on(CreateBlogsTable::TABLE);
            $table->foreign('owner_id')->references('id')->on(CreateUsersTable::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop(self::TABLE);
    }
}
