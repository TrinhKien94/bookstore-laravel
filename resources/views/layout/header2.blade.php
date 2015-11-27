<div id="templatemo_menu">
	<ul>
        <li><a href="{{url('/')}}" class="current">Home</a></li>
        @if(Auth::check())
            <li><a href=" {{url('/user_info')}} "> Admin: {{Auth::user()->username}} </a></li>
            <li><a href="{{url('/admin_users')}}" >Quản lý user</a></li>
            <li><a href="{{url('/admin_books')}}" >Quản lý sách</a></li>
            <li><a href="{{url('/auth/logout')}}">Logout</a></li>
        @else <li><a href="{{ url('/admin/login') }}">Login</a></li>
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
