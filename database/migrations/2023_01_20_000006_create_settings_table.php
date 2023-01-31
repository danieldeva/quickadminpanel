<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('welcome_message')->nullable();
            $table->longText('copyright')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }
}
