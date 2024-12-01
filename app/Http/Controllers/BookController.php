<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     

    public function index()
    {
         $books=Book::with(['Category','Publisher'])->get();
        return view('admin.pages.Book.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function detail(String $id)
     {
        $books=Book::Where('Id',$id)->with(['Category','Publisher'])->first();
         return view('admin.pages.Book.detail',['books'=>$books]);
     }
    public function create()
    {
        $categories = Category::all();
        $publis = Publisher::all();
        return view('admin.pages.Book.create',['categories'=>$categories,'publis'=>$publis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:50|unique:books,Name',
            'About' => 'required|string|max:250',
            'Publisher_id' => 'required',
            'Quantity' => 'required',
            'author' => 'required',
            'Price' => 'required',
            'Publised_year' => 'required',
            'Create_by' => 'required|string|max:50',
        ], [
            'Name.required' => 'Thiếu tên sách',
            'Name.unique' => 'Tên sách đã tồn tại.',
            'Name.max' => 'Tên sách không được dài quá 50 ký tự.',
            
            'About.required' => 'Thông tin là bắt buộc.',
            'About.max' => 'Thông tin không được dài quá 250 ký tự.',

            'Publisher_id.required' => 'Thông tin là bắt buộc.',

            'author.required' => 'Thông tin là bắt buộc.',
            'Quantity.required' => 'Thông tin là bắt buộc.',
            'Price.required' => 'Thông tin là bắt buộc.',
            'Publised_year.required' => 'Thông tin là bắt buộc.',

            'Create_by.required' => 'Thông tin là bắt buộc.',
            'Create_by.max' => 'Thông tin không được dài quá 50 ký tự.',
        ]);
    
        // Kiểm tra xem xác thực có thất bại không
        if ($validator->fails()) {
            // Nếu xác thực thất bại, trả về với thông báo lỗi và dữ liệu cũ
            // dd($validator->errors());
            return back()
                ->withErrors($validator)
                ->withInput(); // Giữ lại input mà người dùng đã nhập
        }

        $inputData = [
             'Name' => $request->Name ,
             'About'  => $request->About  ,
             'Categories_id'  => $request->Categories_id   ?? 13,
             'Publisher_id'  => $request->Publisher_id   ,
              'Quantity'=>$request->Quantity,  
              'Price'=>$request->Price,  
             'Image'  => $request->avatar ,
             'author'=>$request->author,  
             'Publised_year'=>$request->Publised_year,  
             'Create_date'  => Now(),
             'Create_by'  => $request->Create_by  ,
             'Update_date'  => null,
             'Update_by'  => null,
             'IsActive'  => $request->has('IsActive') ? 1 : 0
             // ....
         ];
        
        $books = Book::create($inputData); 
        return redirect()->route("show_list_book");
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

        $books=Book::find($id);
        $categories = Category::all();
        $publis = Publisher::all();
        return view('admin.pages.Book.edit',compact('books','categories','publis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $rqt, string $id)
    {
        $books = Book::findOrFail($id);
        
        $inputData=[
            'Name'=>$rqt->Name ?? $books->Name,
            'About'=>$rqt->About ?? $books->About,
            'Image'=>$rqt->img ?? $books->Image,
            'Categories_id'=>$rqt->Categories_id ?? $books->Categories_id,
            'Publisher_id'=>$rqt->Publisher_id  ?? $books->Publisher_id,

            'Quantity'=>$rqt->Quantity ?? $books->Quantity,
            'author'=>$rqt->author ?? $books->author,

            'Update_by'=>$rqt->Update_by ?? $books->Update_by,
            'IsActive'     => $rqt->has('IsActive') ? 1 : 0 
        ];
        
        
        $books->update($inputData);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật danh mục thành công"]);
        return redirect()->route("show_list_book");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();
            return response()->json(['success'=>true,'message' => 'Xóa thể loại thành công']);
        }
        return response()->json(['success'=>false,'message' => 'Thể loại không tồn tại']);
    }
}
