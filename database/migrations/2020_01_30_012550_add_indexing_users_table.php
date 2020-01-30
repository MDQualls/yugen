<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->change();;
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('status_id')->change();;
            $table->foreign('status_id')->references('id')->on('user_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropForeign('users_status_id_foreign');
            $table->integer('role_id')->change();
            $table->integer('status_id')->change();
        });
    }
}
