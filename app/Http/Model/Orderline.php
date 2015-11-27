<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    public function order(){
    	return $this->belongsTo('App\Http\Model\Order');
    }
    public function book(){
    	return $this->belongsTo('App\Http\Model\Book');
    }
}
