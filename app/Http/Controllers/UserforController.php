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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    public function addtoborrow($id)
    {
        $book = Book::where('Id', $id)->first();

        $borrow = session()->get('borrow', []);

        if (isset($borrow[$book->Id])) {
            return response()->json(['warning' => true, 'message' => 'Giới hạn một quyển sách']);
        } else {
            $borrow[$book->Id] = [
                'image' => $book->Image,
                'name' => $book->Name,

            ];
            $count = count($borrow);
            session()->put('borrow', $borrow);
            return response()->json(['success' => true, 'message' => 'Thêm vào phiếu bảo trì thành công', 'count' => $count]);
        }
    }

    public function removeBook($id)
    {
        if ($id) {
            $book = session()->get('borrow');
            if (isset($book[$id])) {
                unset($book[$id]);
                session()->put('borrow', $book);
            }
            return response()->json(['success' => true, 'message' => 'Đã xóa sách khỏi phiếu mượn']);
        }
        return response()->json(['success' => false, 'message' => 'Không tìm sách']);
    }

    public function createBorrow(Request $request)
    {
        $br = new Borrow();
        $br->Borrow_user_id = Auth::user()->Id;
        $br->create_date = now();
        $br->Return_date = now()->addMonth();
        $br->IsAction = 1;
        $br->save();

        $br_id = $br->Id;
        $borrow = session()->get('borrow', []);

        foreach ($borrow as $book_id => $book) {
            $br_detail = new Borrow_detail();

            $br_detail->Borrow_id = $br_id; // Liên kết với phiếu mượn

            $br_detail->Book_id = $book_id; // ID sách
            $br_detail->Create_date=now();
            $br_detail->IsAction=1;
            $br_detail->save(); // Lưu chi tiết phiếu mượn
        }
        session()->forget('borrow');

        // 4. Trả về phản hồi thành công
        return response()->json(['success' => true, 'message' => 'Tạo phiếu mượn thành công']);
    }

    public function detail()
    {
        return view("clinet.borrow_detail");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
