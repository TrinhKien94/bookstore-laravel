{{--*/$quantity=$container['quantity'] /*--}}
<tr>
<!--     <td class="cart_product">
        <a href=""><img src="{{ url() }}/{{$book->image}}.jpg" alt="image" width="100px" height="150" alt=""></a>
    </td> -->
    <td class="cart_description">
        <h4><a href="{{url('book_info')}}/{{$book->id}}">{{$book->title}}</a></h4>
        <p>Tác giả: {{$book->author}}</p>
    </td>
    <td class="cart_price">
        <p>{{$book->price}}.000 VNĐ</p>
    </td>
    <td class="cart_quantity">
        <div class="cart_quantity_button">
            {!!Form::open()!!}
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <input type='number' id="quantity" class='quantity_input'size='10' min="1" max="30" name='quantity' value= "{{$quantity}}" />
            {!!Form::close()!!}
        </div>
    </td>
    <td class="cart_total">
        <p><span class="cart_total_price">{{$container['subtotal']}}</span>.000 VNĐ</p>
    </td>
    <td class="cart_delete">
        {!!Form::open()!!}
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <a class="cart_quantity_delete" href="">Xóa</a>
        {!!Form::close()!!}
    </td>
</tr>