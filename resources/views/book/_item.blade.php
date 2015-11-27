<div class="templatemo_product_box">
	
        @if($book->book_id!==null)
            <h1><a href="{{ url() }}/book_info/{{$book->book_id}}">{{$book->title}}</a></h1>
            <a href="{{ url() }}/book_info/{{$book->book_id}}"><img src="{{ url() }}/{{$book->image}}.jpg" alt="image" width="110px" height="160" /></a>
        @else
            <h1><a href="{{ url() }}/book_info/{{$book->id}}">{{$book->title}}</a></h1>
            <a href="{{ url() }}/book_info/{{$book->id}}"><img src="{{ url() }}/{{$book->image}}.jpg" alt="image" width="110px" height="160" /></a>
        @endif
    <div class="product_info">
    	<p>{{$book->author}}</p>
        <h3>{{$book->price}}.000 VNĐ</h3>
       	<form action="{{url()}}/order" method="POST" class="buy-form" >
	                <input type="hidden" name="book_id" value="{{$book->id}}">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit"class="buy_now_button">
                        Buy now
                    </button>
	                <button class="add_to_cart_button">
	                    Add to cart
	                </button>
	    </form>
<!--         @if($book->book_id!==null)
            <div class="detail_button"><a href="{{ url() }}/book_info/{{$book->book_id}}">Detail</a></div>
        @else
            <div class="detail_button"><a href="{{ url() }}/book_info/{{$book->id}}">Detail</a></div>
        @endif -->
    </div>
    <div class="cleaner">&nbsp;</div>
</div>