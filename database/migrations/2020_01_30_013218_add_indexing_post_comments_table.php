<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexingPostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->change();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_comments', function (Blueprint $table) {
            $table->dropForeign('post_comments_post_id_foreign');
            $table->dropForeign('posts_comments_user_id_foreign');
            $table->integer('post_id')->change();
            $table->integer('user_id')->change();
        });
    }
}
