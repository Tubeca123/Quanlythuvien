<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.pages.Category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.pages.Category.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:50|unique:publisher,Name',
            'About' => 'required|string|max:250',
            'Create_by' => 'required|string|max:50',
        ], [
            'Name.required' => 'Thiếu tên nhà xuất bản',
            'Name.unique' => 'Tên nhà xuất bản đã tồn tại.',
            'Name.max' => 'Tên nhà xuất bản không được dài quá 50 ký tự.',
       
            'About.required' => 'Thông tin là bắt buộc.',
            'About.max' => 'Thông tin không được dài quá 250 ký tự.',

            'Create_by.required' => 'Thông tin là bắt buộc.',
            'Create_by.max' => 'Thông tin không được dài quá 50 ký tự.',
        ]);
    
        
        if ($validator->fails()) {
            
            // dd($validator->errors());
            return back()
                ->withErrors($validator)
                ->withInput(); // 
        }

        $inputData = [
            'Name' => $request->Name,
            'About'  => $request->About  ,
            'Create_date'  => Now(),
            'Create_by'  => $request->Create_by ,
            'Update_date'  => null,
            'Update_by'  => null,
            'IsActive'  => $request->has('IsActive') ? 1 : 0
            // ....
        ];
       
       $category = Category::create($inputData); 
       return redirect()->route("show_list_category");
    // dd($category);
    //     // cc3
    //     Category::insert($inputData);
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
         $categories=Category::find($id);
         return view('admin.pages.Category.edit',['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $rqt, string $id)
    {
        $categori = Category::findOrFail($id);
        
        $inputData=[
            'Name'=>$rqt->Name ?? $categori->Name,
            'About'=>$rqt->About ?? $categori->About,
            'Update_by'=>$rqt->Update_by ?? $categori->Update_by,
            'IsActive'     => $rqt->has('IsActive') ? 1 : 0 
        ];
        
        
        $categori->update($inputData);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật danh mục thành công"]);
        return redirect()->route("show_list_category");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $category = Category::find($id);
        if($category){
            $category->delete();
            return response()->json(['success'=>true,'message' => 'Xóa thể loại thành công']);
        }
        return response()->json(['success'=>false,'message' => 'Thể loại không tồn tại']);
    }
}
