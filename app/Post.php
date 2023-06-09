<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model {
    use SoftDeletes;
    //table name if not same as model
    protected $table = "tbl_posts";
    //id if not "id"
    protected $primaryKey = "post_id";
    protected $dates = ['post_deleted_at'];

    protected $fillable = ['post_title', 'post_body', 'post_deleted_at'];
}
