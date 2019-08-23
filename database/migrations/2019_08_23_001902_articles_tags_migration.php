<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesTagsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_article_tags', function(Blueprint $table)
            {
                $table->increments('id_article_tags');
                $table->integer('article_id')->unsigned();
                $table->integer('tag_id')->unsigned();

                $table->foreign('article_id')->references('id_article')->on('tb_articles')->onDelete('cascade');
                $table->foreign('tag_id')->references('id_tag')->on('tb_tags')->onDelete('cascade');
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
        Schema::dropIfExists('tb_article_tags');
    }
}
