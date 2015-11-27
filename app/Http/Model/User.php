<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function order(){
    	return $this->hasMany('App\Http\Model\Order');
    }
}
