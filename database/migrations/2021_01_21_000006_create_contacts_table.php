<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street_name')->nullable();
            $table->string('phone');
            $table->string('open_time')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
