<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $hidden = [
        'user', 'user_id',
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
