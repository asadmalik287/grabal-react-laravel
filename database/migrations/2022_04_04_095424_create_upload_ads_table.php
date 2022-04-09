<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_ads', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('null');
            $table->enum('page', ['home','sidebar ','serviceDetail'])->default('null');
            $table->string('attachment_link')->default('null');
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
        Schema::dropIfExists('upload_ads');
    }
}
