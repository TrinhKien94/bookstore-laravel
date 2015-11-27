<!-- resources/views/auth/register.blade.php -->
@extends('layout.default')
@section('title','Sign Up')
@section('content-title','Đăng ký')
@section('content')
@include('shared.errors_message')
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <table>
         <tr>
            <td>Họ tên</td>
            <td><input type="text" size="30" name='name' value="{{ old('name') }}" /></td>
        </tr>
        <tr>
            <td>Giới Tính</td>
            <td>
            <select name="sex">
              <option value="1" selected="selected">Nam</option>
              <option value="0">Nữ</option>
            </select>
            </td>
        </tr>
         <tr>
            <td>Phone</td>
            <td><input type="varchar" size="15" name="phone" value="{{ old('phone') }}"/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" size="30" name="email" value="{{ old('email') }}"/></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea type="text" cols="50" row="4" name="address">{{ old('address') }}</textarea></td>
        </tr>
        <tr>
            <td>Ngày Tháng Năm Sinh</td>
            <td><input id="datepicker" type="date" name="birthday" value="{{ old('birthday') }}"/></td>
        </tr>
        <tr><td>----------------------</td></tr>
        <tr>
            <td>Username</td>
            <td><input type="text" size="30" name="username" value="{{ old('username') }}"/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" size="30" name="password" /></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" size="30" name="password_confirmation" /></td>
        </tr>
        <tr><td>----------------------</td></tr>        
        <tr>
            <td><h2><input type="submit" value="Hoàn Tất" name="singup"  /></h2></td>
        </tr>

    </table>

</form>
@stop