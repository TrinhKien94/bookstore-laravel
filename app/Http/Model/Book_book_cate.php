<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Book_book_cate extends Model
{
    public function book(){
    	return $this->belongsTo('App\Http\Model\Book');
    }
    public function book_cate(){
    	return $this->belongsTo('App\Http\Model\Book_cate');
    }
}
