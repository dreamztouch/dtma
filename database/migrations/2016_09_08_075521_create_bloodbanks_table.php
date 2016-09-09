<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloodbanks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bloodbank_name', 200)->default('Name not found');
            $table->text('location');
            $table->string('area', 100);
            $table->string('city', 100);
            $table->string('contact')->default('Contact not available');
            $table->string('bloodbank_email')->default('Email not available');
            $table->string('bloodbank_web')->default('Website not available');
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
        Schema::dropIfExists('bloodbanks');
    }
}
