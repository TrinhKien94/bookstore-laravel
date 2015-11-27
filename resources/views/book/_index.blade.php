@extends('layout.default')
@section('title','Home Page')
@section('content-title','Sách được xem nhiều nhất')
@section('content')
	<div class="list-books"> 
	    @foreach($books as $book)
	        @include('book._item')
	    @endforeach
    </div>
    {!! $books->render() !!}
@stop


