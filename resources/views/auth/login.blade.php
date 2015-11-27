<!-- resources/views/auth/login.blade.php -->
@extends('layout.default')
@section('title','Login')
@section('content')
@include('shared.errors_message')
@section('content-title','Login')
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <table>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="text" name="email"/></td>
            <td>
                
            </td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" size="25" name="password" /></td>
            <td>
                
            </td>
        </tr>
        <tr><td><input type="checkbox" value="1" name="remember" />Ghi nhớ</td></tr>
        
        <tr><td>-----------------</td></tr>
        <tr><td><input type="submit" name="login" value="Login" /></td></tr>
    </table>

</form>
@stop