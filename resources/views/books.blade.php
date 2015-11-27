@extends('layout.admin')
@section('content')


    
<div class="templatemo_content_right">
    <h1>Quản lý sách</h1>
</div>
<div class="paginate_clear"></div>


@if(Session::has('flash_message'))
    <h1 class='alert alert-success'>
        {{Session::get('flash_message')}}
    </h1>
@endif 
<div class="templatemo_content_right">
    @if(!empty($books))
        <div>
            <form acction="{{ url('/admin_books') }}" method="POST">
                <table>
                    <h1>SEARCH SÁCH</h1>
                    <tr><td><input type="text" size="30" name='search_text' /></td>
                        <td><input type="submit" name="search" value="Tìm Kiếm" /></td></tr>
                </table>
            </form>
        </div>  

        <div>
            <table>
                @foreach($books as $b)
                    <div class="templatemo_product_box">
                        <h1> {{$b->title}} </h1>
                        <img src="../public/images/common/templatemo_image_01.jpg" alt="image" />
                        <div class="product_info">
                            <p>Author: {{$b->author}}</p>
                            <h3>{{$b->price}}.000 vnd</h3>
                            <div class="detail_button"><a href="{{url('/book_info/')}}/{{$b->id}}">Detail</a></div>
                            <div>
                                <form acction="{{url('/delete_book')}}" method= "POST">
                                    <input type= 'hidden' name= 'book_id' value= "{{$b->id}}" />
                                    <input type='submit' value= 'Xóa' />
                                </form>
                            </div>
                        </div>
                        <div class="cleaner">&nbsp;</div>
                    </div>
                @endforeach
            </table>
        </div>
        <div class="paginate_clear"></div>
        <div class= "paginate">
            {{$books->links()}}
        </div>
    @endif
</div>  


@stop


