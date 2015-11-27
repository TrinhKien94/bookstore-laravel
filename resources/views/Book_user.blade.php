@extends('layout.default')
@section('content')


<div>
	<table>
		<h1>danh sách books của user</h1>
		<tr>
			<td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="{{url('/add_books', Auth::user()->id)}}" ><h1>Thêm sách</h1></a></td>
			<td></td>
		</tr>
	</table>
</div>


@stop