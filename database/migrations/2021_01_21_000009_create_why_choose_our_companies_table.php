<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyChooseOurCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('why_choose_our_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->text('file');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
