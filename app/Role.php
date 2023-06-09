<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    public function users() {
        return $this->belongsToMany('App\User', 'role_tbl_users', 'user_id', 'role_id');
    }
}
