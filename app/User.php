<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
    use Notifiable;
    /**
     * SoftDeletes commented out because we don't use it in users table
     */
    // use SoftDeletes;


    //table name if not same as model
    protected $table = "tbl_users";
    //id if not "id"
    protected $primaryKey = "user_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_email_verified_at' => 'datetime',
    ];

    public function post() {
        //class which field with relation wich id in search
        return $this->hasOne('App\Post', 'post_user_id', 'post_id');
    }

    public function posts() {
        return $this->hasMany('App\Post', 'post_user_id');
    }

    public function roles() {
        //class, pivot table, field name(s)
        return $this->belongsToMany('App\Role', 'role_tbl_users', 'user_id');
    }
}
