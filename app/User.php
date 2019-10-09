<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tb_users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name_user', 'email_user','avatar', 'password_user','type_user','ban'
    ];

    
    protected $hidden = [
        'password_user', 'remember_token',
    ];

 
 public function articles()
 {
    return $this->hasMany('App\Article','id_user','user_id');
 }

 public function comments()
 {
    return $this->hasMany('App\Comment');
 }

 public function avatar()
 {
    return $this->hasOne('App\Image','user_id','id_user');
 }

 
}
