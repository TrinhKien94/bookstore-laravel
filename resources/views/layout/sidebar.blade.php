<div id="templatemo_content_left">
    <div class="templatemo_content_left_section">
    	<h1>Categories</h1>
        <ul>
            @foreach($categories as $category)
            <li><a class="parent">{{$category->name}}</a>
                <ul class="submenu">
                {{--*/ $book_cates=$category->book_cates /*--}}
                @foreach($book_cates as $book_cate)
                    <li><a href="{{ url() }}/book_cate/{{$book_cate->id}}">{{$book_cate->name}}</a></li>
                @endforeach
                </ul>
            </li>    
            @endforeach    
    	</ul>
    </div>
    <div class="templatemo_content_left_section">
    	<h1>Bestsellers</h1>
        <ul>
            <li><a href="#">Sách bán chạy</a></li>
    	</ul>
    </div>

</div> <!-- end of content left -->
