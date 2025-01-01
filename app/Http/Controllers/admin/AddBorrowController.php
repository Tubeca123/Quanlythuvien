<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow_detail;

class AddBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['Category', 'Publisher'])->get();
        return view('admin.pages.Add.Add', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view_book()
    {
        $books = Book::with(['Category', 'Publisher'])->get();
        return view('admin.pages.Add.index', ['books' => $books]);
    }

    public function searchStudent($id)
    {
        $books = Book::with(['Category', 'Publisher'])->get();
        $student = User::where('SV_id', $id)->first();
        if ($student) {
            return response()->json([
                'success' => true,
                'student' => [
                    'id' => $student->Id,
                    'name' => $student->Full_name
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sinh viên không tồn tại.',
            ]);
        }
    }

    public function createBorrow(Request $request)
    {
        if (!$request->student_id) {
            return response()->json(['success' => false, 'message' => 'Hãy nhập mã sinh viêns.'], 404);
        }
        
        $user  = User::Where('SV_id',$request->student_id)->first();

        $br = new Borrow();
        $br->Borrow_user_id = $user->Id;
        $br->Borrow_admin_id = Auth::user()->Id;
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

            $br_detail->Book_id = $book_id; 
            $br_detail->Create_date = now();
            $br_detail->IsAction = 1;
            $br_detail->save(); 
        }
        session()->forget('borrow');
        return response()->json(['success' => true, 'message' => 'Tạo phiếu mượn thành công']);
    }
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
