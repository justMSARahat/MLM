<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('address')->nullable();
            $table->text('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->text('map_api')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('schedule1')->nullable();
            $table->string('schedule2')->nullable();
            $table->string('schedule3')->nullable();
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
        Schema::dropIfExists('contactinfos');
    }
}
