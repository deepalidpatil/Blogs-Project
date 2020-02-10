<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [ 'user_id', 'title', 'description' ];

    public function get_users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
