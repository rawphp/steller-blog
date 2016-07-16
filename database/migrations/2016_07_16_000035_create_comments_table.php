<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCommentsTable
 */
class CreateCommentsTable extends Migration
{
    const TABLE = 'comments';

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('content');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on(CreatePostsTable::TABLE);
            $table->foreign('user_id')->references('id')->on(CreateUsersTable::TABLE);
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
