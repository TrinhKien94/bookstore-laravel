<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Book_cate extends Model
{
    public function category(){
    	return $this->belongsTo('App\Http\Model\Category');
    }
    public function book_book_cates(){
    	return $this->hasMany('App\Http\Model\Book_book_cate');
    }
}
