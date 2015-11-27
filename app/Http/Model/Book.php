<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['title', 'author', 'price','quantity','description','views','image'];
    public function book_book_cate(){
    	return $this->hasOne('App\Http\Model\Book_book_cate');
    }
    public function orderlines(){
    	return $this->hasMany('App\Http\Model\Orderline');
    }
}
