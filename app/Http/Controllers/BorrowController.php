<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;
use App\Models\Borrow_detail;
use App\Models\Book;
use App\Models\Borrow_return;
use App\Models\Borrow_return_detail;
use App\Models\Punish;

class BorrowController extends Controller
{
    
    public function index($id)
    {
        $br = Borrow_return::where('Borrow_id', $id)->first();
        $pn = Borrow_return_detail::with('book')->where('Borrow_return_id',$br->Id)->get();
        
        return view('admin.pages.Punish.index', ['pn' => $pn]);
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
            // return response()->json(['success' => true, 'message' => 'Thêm vào phiếu mượn', 'count' => $count]);
            return response()->json(['success' => true, 'message' => 'Thêm vào phiếu mượn', 'count' => $count, 'data' =>  $borrow]);

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
        $br->Status = 1;
        $br->IsAction = 1;
        $br->save();

        $br_id = $br->Id;
        $borrow = session()->get('borrow', []);

        foreach ($borrow as $book_id => $book) {
            $br_detail = new Borrow_detail();

            $br_detail->Borrow_id = $br_id;

            $br_detail->Book_id = $book_id; // ID sách
            $br_detail->Create_date = now();
            $br_detail->IsAction = 1;
            $br_detail->save(); // Lưu chi tiết phiếu mượn
        }
        session()->forget('borrow');

        // 4. Trả về phản hồi thành công
        return response()->json(['success' => true, 'message' => 'Tạo phiếu mượn thành công']);
    }

    
    public function close_brow_wait($id)
    {

        $br = Borrow::find($id);
        if ($br) {

            $br->Status = 0;
            $br->save();

            return response()->json(['success' => true, 'message' => 'Hủy thành công']);
        }

        return response()->json(['success' => false, 'message' => 'Phiếu mượn không tồn tại']);
    }
}
