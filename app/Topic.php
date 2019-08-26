<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
   protected $table = 'tb_topics';
   protected $primaryKey = 'id_topic';
   protected $fillable = ['name_topic'];

   public function article()
   {
   	return $this->hasMany('App\Article','topic_id','id_topic');
   }

   public function scopeTopics($query)
   {
   	return $query->orderBy('name_topic');
   }
}
