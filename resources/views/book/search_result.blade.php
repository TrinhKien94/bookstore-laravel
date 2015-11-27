@extends('layout.default')
@section('title','Kết quả tìm kiếm')
@section('content-title','Kết quả tìm kiếm')
@section('content')
	<div class="list-books"> 
		@if($books==='1')
			<p>Không có kết quả nào phù hợp</p>
			</div>
		@else
	    	@foreach($books as $book)
	        	@include('book._item')
	    	@endforeach
	    	 </div>
  			{!! $books->appends($request)->render() !!}
	    @endif

@stop

