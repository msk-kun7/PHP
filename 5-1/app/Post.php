<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'user_id' => 'required',
        'body' => 'required|max:225',
        // required：nullでない
    );

}
