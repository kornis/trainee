<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	protected $table = 'tb_articles';
    protected $primaryKey = 'id_article';
    protected $fillable = ['title_article','content_article','user_id','comment_id'];


public function user()
{
	return $this->belongsTo('App\User','user_id','id_user');
}

public function comments()
{
	return $this->hasMany('App\Comment','article_id','id_comment');
}
}