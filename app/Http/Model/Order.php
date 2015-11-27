<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Order extends Model
{
    public function orderlines(){
    	return $this->hasMany('App\Http\Model\Orderline');
    }
    public function user(){
    	return $this->belongsTo('App\Http\Model\User');
    }
    public function getDateAttribute(){
	    return Carbon::parse($this->attributes['date'])->format('d-m-Y h:i:s');
    }
}
