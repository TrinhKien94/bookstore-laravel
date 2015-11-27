<div id="templatemo_menu">
	<ul>
        <li><a href="{{url('/')}}" class="current">Home</a></li>
        <li><a href="{{url('/search')}}">Search</a></li>            
        @if(Auth::check())
            <li><a href=" {{url('/auth/info')}} "> {{Auth::User()->email}} </a></li>
            <li><a href="{{url('/cart')}}">Giỏ Hàng<span>(<span class="cart-price">{{Cart::total()}}</span>.000 VNĐ)</span></a></li>
            <li><a href="{{url('/order/history')}}">Lịch sử đơn hàng</li>
            <li><a href="{{url('/auth/logout')}}">Logout</a></li>
        @else <li><a href="{{ url('/auth/login') }}">Login</a></li>
         <li><a href="{{url('/auth/register')}}">Singup</a></li>
        @endif
       
	</ul>
</div> <!-- end of menu -->

<div id="templatemo_header">
	<div id="templatemo_special_offers">
    	<p>
            <span>25%</span> 
            discounts for purchase over $ 40
    	</p>
		<a href="#" style="margin-left: 50px;">Read more...</a>
    </div>
    
    
    <div id="templatemo_new_books">
    	<ul>
            <li>Suspen disse</li>
            <li>Maece nas metus</li>
            <li>In sed risus ac feli</li>
        </ul>
        <a href="#" style="margin-left: 50px;">Read more...</a>
    </div>
</div>
