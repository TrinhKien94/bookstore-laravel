@extends('layout.admin')
@section('content')


@if(Session::has('flash_message'))
    <h1 class='alert alert-success'>
        {{Session::get('flash_message')}}
    </h1>
@endif

<form acction="{{ url('/admin/login') }}" method="POST">
    {!! csrf_field() !!}
    <table>
        <h1>Admin Login</h1>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="text" size="25" name="email" /></td>
            <td>
                
            </td>
        </tr>
        <tr><td><p><p></td></tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" size="25" name="password" /></td>
            <td>
                
            </td>
        </tr>
        <tr><td><input type="checkbox" value="1" />Ghi nhớ</td></tr>
        
        <tr><td>-----------------</td></tr>
        <tr><td><input type="submit" name="login" value="Login" /></td></tr>
    </table>
</form>


@stop