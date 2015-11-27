@extends('layout.default')
@section('title','Thông tin cá nhân')
@section('content-title','Thông tin cá nhân')
@section('content')
@include('shared.errors_message')

<div>
	<h1>
	<table class="user_info">
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td>Họ tên:</td><td></td>
			<td>{{Auth::user()->name}}</td>
		</tr>
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td>Username:</td><td></td>
			<td>{{Auth::user()->username}}</td>
		</tr>
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td>Giới tính:</td><td></td>
			<td>
				@if((Auth::user()->sex)== 0) {{'Nữ'}}
				@else {{'Nam'}}
				@endif
			</td>
		</tr>
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td>Email:</td><td></td>
			<td>{{Auth::user()->email}}</td>
		</tr>
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td>Phone:</td><td></td>
			<td>{{Auth::user()->phone}}</td>
		</tr>
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td>Địa chỉ:</td><td></td>
			<td>{{Auth::user()->address}}</td>
		</tr>
		<tr><td><p><p></td></tr>
		<tr>
			<td></td>
			<td></td>
			<td><a href="{{url()}}/auth/edit">Tùy chỉnh</a></td>
		</tr>
	</table>
	</h1>
</div>


@stop
