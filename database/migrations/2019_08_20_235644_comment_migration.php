<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_comments', function(Blueprint $table){

            $table->increments('id_comment');
            $table->string('title_comment');
            $table->text('content_comment');
            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();

            $table->foreign('user_id')->references('id_user')->on('tb_users')->onDelete('cascade');
            $table->foreign('article_id')->references('id_article')->on('tb_articles')->onDelete('cascade');
           
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
     Schema::dropIfExists('tb_comments');
    }
}
