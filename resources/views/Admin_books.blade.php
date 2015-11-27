@extends('layout.admin')
@section('content')


<div class="templatemo_content_right">
    <h1>Quản lý sách</h1>
</div>

<div class="paginate_clear"></div>


<div class="templatemo_content_right">
    <div>
        <form acction="{{ url('/admin_books') }}" method="POST">
            <table>
                <h1>SEARCH SÁCH</h1>
                <tr><td><input type="text" size="50" name='search_text' /></td>
                    <td><input type="submit" name="search" value="Tìm Kiếm" /></td></tr>
            </table>
        </form>
    </div>  
</div>

<div class="paginate_clear"></div>    


@stop


