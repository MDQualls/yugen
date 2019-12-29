<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotesAndAlertsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('about')->nullable();
            $table->text('admin_note')->nullable();
            $table->boolean('content_alert')->default(false);
            $table->boolean('response_alert')->default(false);
            $table->boolean('offering_alert')->default(false);
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
            $table->dropColumn('about');
            $table->dropColumn('admin_note');
            $table->dropColumn('content_alert');
            $table->dropColumn('response_alert');
            $table->dropColumn('offering_alert');
        });
    }
}
