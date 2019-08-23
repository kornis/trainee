<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_articles', function(Blueprint $table){

            $table->increments('id_article');
            $table->string('title_article');
            $table->text('content_article');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('tb_users')->onDelete('cascade');

            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id_topic')->on('tb_topics')->onDelete('cascade');
            
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
        Schema::dropIfExists('tb_articles');
    }
}
