@extends('layout.default')
@section('title')
{{$category}} - {{ $book_cate_name}}
@stop
@section('content-title')
{{$category}}
- {{$book_cate_name}}
@stop
@section('content')
	<div class="list-books"> 
    @foreach($book_book_cates as $book_book_cate)
        {{--*/ $book=$book_book_cate->book /*--}} 
        @include('book._item')
    @endforeach
    </div>
    {!! $book_book_cates->render() !!}
@stop


