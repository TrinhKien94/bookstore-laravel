<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Book;
use Cart;
use Auth;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    public function post(Request $request){
        	if(Auth::guest())
        		return 'notLogin';
    		$book_id = Request::get('book_id');
        	$book = Book::find($book_id);
       		Cart::add(array('id' => $book_id, 'name' => $book->title, 'qty' => 1, 'price' => $book->price));
            echo Cart::total();
    }
    public function update(Request $request){
            if(Auth::guest())
                return ['login'=>'false'];
            $return_data=array();
            $rowId = Cart::search(array('id' => Request::get('book_id')));
            $item = Cart::get($rowId[0]);
            Cart::update($rowId[0], (int)Request::get('quantity'));
            $return_data['subtotal']=$item->subtotal;
            $return_data['total']= Cart::total();
            echo json_encode($return_data);
    }
    public function remove(Request $request){
            Cart::destroy();
    }
    public function delete(Request $request){
            if(Auth::guest())
                return 'notLogin';
            $rowId = Cart::search(array('id' => Request::get('book_id')));
            Cart::remove($rowId[0]);
            echo Cart::total();
    }
    public function show(){
    	if(Auth::guest())
    		return redirect('auth/login');
    	else{
	    	$containers=array();
	    	$container=array();
	    	$cart =Cart::content();
	    	foreach ($cart as $item) {
	    		$containers["$item->id"]=['quantity'=>$item->qty,'book'=>Book::find($item->id),'subtotal'=>$item->subtotal];
	    	}
	    	return Controller::myView('cart.show')->with('containers',$containers);
    	}
    }
}
