@extends('layout.default')
@section('title','Search')
@section('content-title','search')
@section('content')
<form action="{{ url() }}/search/result" method="get">
    <table class="search">
        <tr><input type="text" size="80" name="search_text" placeholder="Nhập tên sách cần tìm"></input></tr>
        <tr><td><p>Các tiêu chí tìm kiếm:</p></td></tr>
        <tr>
        	<td>
        		 {!! Form::checkbox('check_author', true, false,['class'=>'checkbox']); !!} {!! Form::label('Tác giả') !!}
	        </td>   
	        <td></td>   
	        <td>
	        	<input type="text" name="author" placeholder="Tên tác giả" class="select">
	        	<!-- <select class="select" name="author">
	              <option value="1" selected="selected">Tên sách</option>
	              <option value="0">Tác giả</option>
	            </select> -->
	        </td>
	    </tr>
	    <tr>
	        <td>
				{!! Form::checkbox('check_category', true, false,['class'=>'checkbox']); !!} {!! Form::label('Loại sách') !!}
	        </td>
	        <td></td> 
	        <td>
				<select class="select" name="categories">
				@foreach($categories as $category)
				{{--*/ $book_cates=$category->book_cates /*--}}
				<optgroup label="{{$category->name}}">
				  @foreach($book_cates as $book_cate)
	             	 <option value="{{$book_cate->id}}">{{$book_cate->name}}</option>
	              @endforeach
	            </optgroup>
	            @endforeach
	            </select>
	        </td>
	    </tr>
	    <tr>
	        <td>
				{!! Form::checkbox('check_price', true, false,['class'=>'checkbox']); !!} {!! Form::label('Giá bán') !!}
        	</td>
	        <td></td> 
	        <td>
	        	<select class="select" name="price">
	              <option value="0" selected="selected">Dưới 20.000</option>
	              <option value="1">Từ 20.000 đến 50.000</option>
	              <option value="2">Từ 50.000 đến 100.000</option>
	              <option value="3">Trên 100.000</option>
	            </select>
	        </td>
        </tr>
        <tr><td><input class="search-button"type="submit" name="search" value="Tìm Kiếm" /></td></tr>
    </table>
</form>

@stop