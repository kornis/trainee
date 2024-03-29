<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tb_tags';
    protected $primaryKey = 'id_tag';
    protected $foreignKey = 'article_id';

    protected $fillable = ['name_tag'];

    public function article(){
    	return $this->belongsToMany('App\Article','tb_article_tag','tag_id','article_id');
    }
}
