<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mobil_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('speks');
            $table->timestamps();

            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speks');
    }
}
