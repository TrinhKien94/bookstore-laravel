<tr>
    <td class="cart_description">
        <h4><a href="{{url('book_info')}}/{{$book->id}}">{{$book->title}}</a></h4>
        <p>Tác giả: {{$book->author}}</p>
    </td>
    <td class="cart_price">
        <p>{{$book->price}}.000 VNĐ</p>
    </td>
    <td class="cart_quantity">
        <p>{{$orderline->quantity}}</p>
    </td>
    <td class="cart_total">
        <p><span class="cart_total_price">{{$orderline->price}}</span>.000 VNĐ</p>
    </td>
</tr>