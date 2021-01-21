<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSlidesTable extends Migration
{
    public function up()
    {
        Schema::create('home_page_slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('caption');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
