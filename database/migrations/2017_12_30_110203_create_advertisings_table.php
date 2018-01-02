<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('img');
            $table->string('title');
            $table->text('description');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('coverage');
            $table->date('start');
            $table->date('done');
            $table->string('resi')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('perpanjang')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisings');
    }
}
