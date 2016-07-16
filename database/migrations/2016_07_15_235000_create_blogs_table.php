<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBlogsTable
 */
class CreateBlogsTable extends Migration
{
    const TABLE = 'blogs';

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

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
