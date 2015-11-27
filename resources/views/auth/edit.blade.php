@extends('layout.default')
@section('title','Sửa thông tin cá nhân')
@section('content-title','Sửa thông tin cá nhân')
@section('content')
@include('shared.errors_message')
{!! Form::open(array('action' =>'Auth\AuthController@putUpdate')) !!}
    {!! csrf_field() !!}
    <table>
         <tr>
            <td>Họ tên</td>
            <td><input type="text" size="30" name='name' value= '{{Auth::user()->name}}' /></td>
        </tr>
        <tr>
            <td>Giới Tính</td>
            <td>
            @if(Auth::user()->sex==1)
                <select name="sex">
                  <option value="1" selected="selected">Nam</option>
                  <option value="0">Nữ</option>
                </select>
            @else
                <select name="sex">
                  <option value="1">Nam</option>
                  <option value="0" selected="selected">Nữ</option>
                </select>
            @endif
            </td>
        </tr>
         <tr>
            <td>Phone</td>
            <td><input type="varchar" size="15" name="phone" value='{{Auth::user()->phone}}' /></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea cols="50" row="4" name="address">{{Auth::user()->address}}</textarea></td>
        </tr>
        <tr>
            <td>Ngày Tháng Năm Sinh</td>
            <td><input id="datepicker" type="text" name="birthday" value='{{Auth::user()->birthday}}' /></td>
        </tr>
        <tr><td>----------------------</td></tr>
        <tr>
            <td>Current-password</td>
            <td><input type="password" size="30" name="current_password" /></td>
        </tr>
        <tr>
            <td>New-password</td>
            <td><input type="password" size="30" name="password" /></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" size="30" name="password_confirmation" /></td>
        </tr>
        <tr><td>----------------------</td></tr>        
        <tr>
            <td><h2><input type="submit" value="Hoàn Tất"  /></h2></td>
        </tr>

    </table>
{!! Form::close() !!}

@stop