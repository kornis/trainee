<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = "tb_images";
	protected $primaryKey = 'id_image';
	protected $foreignKey = 'article_id';
    protected $fillable = ['name_image'];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id_user');
    }

}
