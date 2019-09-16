<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class imagesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_images',function(Blueprint $table){

            $table->increments('id_image');
            $table->string('name_image');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id_user')->on('tb_users')->onDelete('cascade');
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
        Schema::dropIfExists('tb_images');
    }
}
