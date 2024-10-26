<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Borrow_detail;
use App\Models\Borrow_return;
use App\Models\Borrow_return_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Borrow_wait()
    {
        $br = Borrow::where('Status', 1)->get();
        // dd($br);
        return view('admin.pages.Borrow.borrow_wait', ['br' => $br]);
    }
    public function add_borrow($id)
    {

        $br = Borrow::find($id);
        if ($br) {

            $br->Status = 2;
            $br->save();

            return response()->json(['success' => true, 'message' => 'Xác nhận  thành công']);
        }

        return response()->json(['success' => false, 'message' => 'Phiếu mượn không tồn tại']);
    }

    public function Borrowing()
    {
        $br = Borrow::where('Status', 2)->get();
        // dd($br);
        return view('admin.pages.Borrow.borrowing', ['br' => $br]);
    }
    public function get_return($id)
    {
        $book = Borrow_detail::with('book')->where('Borrow_id', $id)->get();
        $sv = Borrow::with('user')->where('Id', $id)->first();
        $br=Borrow::find($id);
        return view('admin.pages.Borrow.book_in_borrow', ['br'=>$br,'book' => $book,'sv'=>$sv]);
    }
    public function return_borrow(Request $rq,$id)
    {
        $br =Borrow::find($id);
        
        if(!$br)
        {
            return response()->json(['success' => false, 'message' => 'Phiếu mượn không tồn tại.']);
        }

        $br->Status=3;
        $br->Save();

        $br_return = new Borrow_return();
        $br_return->Borrow_id= $id;
        $br_return->Admin_id = Auth::user()->Id;
        $br_return->Return_date =  $br->Return_date;
        $br_return->Create_date =now();
        $br_return->IsAction =1;
        $br_return->save();
         
        foreach ($br->details as $detail) {  
            $status = $rq->input('status_' . $detail->Book_id);
            
            $return_detail = new Borrow_return_detail();
            
            $return_detail->Borrow_return_id = $br_return->Id;
            $return_detail->Book_id = $detail->Book_id;
            $return_detail->Status = $status; 
            $return_detail->Create_date=now();
            $return_detail->IsAction=1;
            $return_detail->save();
        }

        return  response()->json(['success' => true, 'message' => 'Phiếu mượn đã được trả thành công.']);

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
