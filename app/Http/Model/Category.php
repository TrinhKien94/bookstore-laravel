<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function book_cates(){
    	return $this->hasMany('App\Http\Model\Book_cate');
    }
}
