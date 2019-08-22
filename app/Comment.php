<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	    protected $table = 'tb_comments';
   protected $fillable = ['title_comment','content_comment'];
protected $primaryKey = 'id_comment';

   public function user()
   {
   	return $this->belongsTo('App\User');
   }

   public function article()
   {
   	return $this->belongsTo('App\Article','comment_id','id_comment');
   }
}
