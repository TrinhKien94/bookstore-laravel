<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Model\User;
use App\Http\Model\Book;
use Session;
class AdminController extends Controller{
    public function login()
    {
        if(Auth::check())
            Auth::logout();
        return Controller::myView('Admin_login');
    }
    //
    public function checkLogin(Request $request)
    {
        $user = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($user))
        {
            if(Auth::user()->role == 1)
            {   
                return redirect('/admin_users');
            }
            else
            {
                Auth::logout();

                Session::flash('flash_message', 'Bạn không phải admin!');
                return redirect('/login');
            }
        }
        else
        {
            Session::flash('flash_message', 'Sai tên đăng nhập hoặc mật khẩu!');
            return redirect('Admin_login');
        }

    }
    //
    public function admin_books()
    {
        
        return Controller::myView('Admin_books');
    }
    //
    public function search_book()
    {
        $va = $request->input('search_text');
        $b = Book::where('title', 'like', "%".$va."%")
                    ->count();

        if($b < 1) 
        {
            Session::flash('flash_message', 'Không tìm thấy kết quả nào!');
            return redirect('/admin_books');
        }
        else
        {
            $books = Book::where('title', 'like', "%".$va."%")->paginate(6);
            return redirect('books', $books);
        }
    }
    //
    public function delete_book(Request $request)
    {
        $book = Book::find($id);    
        $book->delete();
        Session::flash('flash_message', 'Xóa thành công!');
        return redirect('/admin_books');
    }
    //
    //
    //
    public function admin_users()
    {
        return Controller::myView('Admin_users');
    }
    //
    public function search_user(Request $request)
    {
        $va = $request->input('search_text');
        $n = User::where('name', 'like', "%".$va."%")
                    ->orwhere('username', 'like', "%".$va."%")
                    ->count();

        if($n < 1) 
        {
            Session::flash('flash_message', 'Không tìm thấy kết quả nào!');
            return Controller::myView('/admin_users');
        }
        else
        {
            $users = User::where('name', 'like', "%".$va."%")
                        ->orwhere('username', 'like', "%".$va."%")
                        ->paginate(6);
            return Controller::myView('users')->with('users', $users);
        }
    }
    //
    public function delete_user(Request $request)
    {
        $user = User::find((int)$request->input('user_id'));    
        $user->delete();
        Session::flash('flash_message', 'Xóa thành công!');
        return Controller::myView('/users')->with('users',$request);
    }

}