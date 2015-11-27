<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Auth;
use Cart;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Orderline;
use App\Http\Model\Order;
use App\Http\Model\Book;
class OrderController extends Controller
{
    public function history(){
        $orders = Order::where('user_id','=',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return Controller::myView('order.history')->with('orders',$orders);
    }
    public function show($id){
            $order = Order::find($id);
            if($order->user_id===Auth::user()->id){
                $orderlines=$order->orderlines()->get();
                $containers = array();
                foreach ($orderlines as $orderline ) {
                    $data=array();
                    $data['orderline']=$orderline;
                    $data['book']=$orderline->book;
                    $containers[]=$data;
                }
                return Controller::myView('order.show')->with('containers',$containers)->with('total',$order->money);
            }else{
                return redirect("/");
            }
    }
    public function cancel(){

    }
    public function order_one(Request $request){
        $order = new Order;
        $book = Book::find((int)$request->input('book_id'));
        if($this->checkQuantity(1,$book)){
            $orderline = new Orderline;
            $order->user_id=Auth::user()->id;
            $order->date=Carbon::now();
            $order->money = $book->price;
            $order->save();
            $orderline->order_id=$order->id;
            $orderline->book_id = $book->id;
            $orderline->quantity =1;
            $orderline->price = $book->price;
            $orderline->save();
            $book->update(['quantity'=>($book->quantity-1)]);
            return redirect("order/$order->id");
        }
        else{
            echo "k du";
        }
    }
    public function store(){
        if(Auth::guest())
            return redirect('auth/login');
        else{
            $containers=array();
            $container=array();
            $cart =Cart::content();
            $order = new Order;
            $order->user_id=Auth::user()->id;
            $order->date= Carbon::now();
            $order->money = Cart::total();
            $order->save();
            foreach ($cart as $item) {
                $orderline = new Orderline;
                $orderline->order_id= $order->id;
                $orderline->quantity = $item->qty;
                $orderline->book_id= $item->id;
                $orderline->price = $item->subtotal;
                $orderline->save();
            }
            Cart::destroy();
            return redirect("order/$order->id"); 
        }
    }
    public function checkQuantity($quantity,$book){
        if($quantity > $book->quantity) return false;
        return true;
    }
}
