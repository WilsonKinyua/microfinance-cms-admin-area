<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutOurCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('about_our_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
