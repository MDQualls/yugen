<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimeslineDataForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timeline_data', function (Blueprint $table) {
            $table->foreign('timeline_id')->references('id')->on('timelines');
            $table->foreign('timeline_type_id')->references('id')->on('timeline_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timeline_data', function (Blueprint $table) {
            $table->dropForeign('timeline_data_timeline_id_foreign');
            $table->dropForeign('timeline_data_timeline_type_id_foreign');
        });
    }
}
