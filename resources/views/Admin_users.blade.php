@extends('layout.admin')
@section('content')

    
<div class="templatemo_content_right">
    <h1>Quản lý users</h1>
</div>
<div class="paginate_clear"></div>

@if(Session::has('flash_message'))
    <h1 class='alert alert-success'>
        {{Session::get('flash_message')}}
    </h1>
@endif 
<div class="templatemo_content_right">
    <div>
        <form action="{{ url('/admin_users') }}" method="POST">
            {!! csrf_field() !!}
            <table>
                <h1>SEARCH USER</h1>
                <tr><td><input type="text" size="50" name='search_text' /></td>
                    <td><input type="submit" name="search" value="Tìm Kiếm" /></td></tr>
            </table>
        </form>
    </div>  
</div>


@stop


