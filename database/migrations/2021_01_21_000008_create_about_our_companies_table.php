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
            $table->longText('mission');
            $table->longText('description');
            $table->longText('vision');
            $table->longText('ourgoals');
            $table->text('file');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
