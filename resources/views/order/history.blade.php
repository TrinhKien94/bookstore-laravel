@extends('layout.default')
@section('title','Lịch sử đặt hàng')
@section('content-title','Lịch sử đặt hàng')
@section('content')
	<table class="order">
	    <thead>
	        <tr class="cart_menu">
	            <td class="index">STT</td>
	            <td class="item-title">Ngày đặt</td>
	            <!-- <td class="description"></td> -->
	            <td class="total">Tổng</td>
	            <td class="total">Chi tiết</td>
	        </tr>
	    </thead> 
	    <tbody>
	    {{--*/$i=0 /*--}}
    	@foreach($orders as $order)
    		<tr>
    			{{--*/$i=$i+1 /*--}}
    			<td>{{$i}}</td>
    			<td>{{$order->date}}</td>
    			<td>{{$order->money}}.000 VNĐ</td>
			    <td>
			            <a href="{{url()}}/order/{{$book->id}}">Sửa</a>
			    </td>
    		</tr>
	    @endforeach
		</tbody>
    </table>
@stop