<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForiegnKeyGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->unsignedBigInteger('gallery_id')->change();;
            $table->foreign('gallery_id')->references('id')->on('galleries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropForeign('gallery_images_gallery_id_foreign');
            $table->integer('gallery_id')->change();
        });
    }
}
