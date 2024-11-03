<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Borrow_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserforController extends Controller
{
    //trang chủ
    public function Trangchu()
    {
        $books = Book::with(['Category', 'Publisher'])->get();
        return view('clinet.index', ['books' => $books]);
    }
    //danh sách phiếu chờ
    public function list_borrow_wait()
    {
        $user = Auth::user()->Id;
        // dd($user);
        $br = Borrow::where('Borrow_user_id', $user)->where('Status',  1)->get();
        // dd($br);
        return view('clinet.user.borrow_wait', ['br' => $br]);
    }
    //danh sách phiếu đang mượn
    public function list_borrowing()
    {
        $user = Auth::user()->Id;
        // dd($user);
        $br = Borrow::where('Borrow_user_id', $user)->where('Status', 2)->get();
        // dd($br);
        return view('clinet.user.borrowing_list', ['br' => $br]);
    }
    // thông tin danh sách trong phiếu
    public function book_wait(String $id)
    {
        // dd($id);
        $br = Borrow_detail::with('book')->where('Borrow_id', $id)->get();

        return view('clinet.user.book_in_borrow', ['br' => $br]);
    }
    // danh sách phiếu đã hủy
    public function list_close_br()
    {
        $user = Auth::user()->Id;
        // dd($user);
        $br = Borrow::where('Borrow_user_id', $user)->where('Status', 0)->get();
        // dd($br);
        return view('clinet.user.list_borrow_close', ['br' => $br]);
    }
    // danh sách phiếu đã hủy
    public function done_br()
    {
        $user = Auth::user()->Id;
        // dd($user);
        $br = Borrow::where('Borrow_user_id', $user)->where('Status', 3)->get();
        // dd($br);
        return view('clinet.user.list_borrow_done', ['br' => $br]);
    }
    // phiếu đang tạo 
    public function detail()
    {
        return view("clinet.borrow.borrow_detail");
    }
}
