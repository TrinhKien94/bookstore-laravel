@extends('layout.default')
@section('title','Giỏ hàng')
@section('content-title','Giỏ hàng')
{{--*/$cart=Cart::content() /*--}}
@section('content')
	<table class="cart">
	 	@if(count($cart))
		    <thead>
		        <tr class="cart_menu">
		            <td class="item-title">Sách</td>
		            <!-- <td class="description"></td> -->
		            <td class="price">Giá</td>
		            <td class="quantity">Số lượng</td>
		            <td class="total">Tổng</td>
		            <td class="action">Xóa</td>
		        </tr>
		    </thead> 
		    <tbody>
	    	@foreach($containers as $id => $container)
	    	    {{--*/$book=$container['book'] /*--}}
	    	    @include('cart.item')
		    @endforeach
		@else
			<p>You have no items in the shopping cart</p>
   		@endif
		</tbody>
    </table>
    @if(count($cart))
    <div style="width=500; height:50px; overflow:hidden;">
    	<form action="{{ url() }}/order" method="get">
			<button class="order_books">Thanh toán</button>
    	</form>
    	<form>
    	    {!! csrf_field() !!}
			<button class="cart_remove">Xóa giỏ hàng</button>
    	</form>
    	
	</div>
	@endif
    	
@stop
