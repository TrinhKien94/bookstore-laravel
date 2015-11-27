@extends('layout.default')
@section('title','Đã nhận đơn hàng')
@section('content-title','Chi tiết đơn hàng')
@section('content')
	<table class="cart">
	    <thead>
	        <tr class="cart_menu">
	            <td class="item-title">Sách</td>
	            <!-- <td class="description"></td> -->
	            <td class="price">Giá</td>
	            <td class="quantity">Số lượng</td>
	            <td class="total">Tổng</td>
	        </tr>
	    </thead> 
	    <tbody>
    	@foreach($containers as $container)
    	    {{--*/$book=$container['book'] /*--}}
    	    {{--*/$orderline=$container['orderline'] /*--}}
    	    @include('order.item')
	    @endforeach
	    	<tr class="cart_menu">
	            <td>Tổng số tiền phải trả</td>
	            <!-- <td class="description"></td> -->
	            <td></td>
	            <td></td>
	            <td>{{$total}}</span>.000 VNĐ</p></td>
	        </tr>
		</tbody>
    </table>
@stop
