<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\Validator;
class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publis=Publisher::all();
        return view('admin.pages.Publisher.index',['publis'=>$publis]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publis=Publisher::all();
        return view('admin.pages.Publisher.create',['publis'=>$publis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:50|unique:publisher,Name',
            'Status' => 'required|string|max:250',
            'Email' => 'required|email|max:100|unique:publisher,Email',
            'Phone' => 'required|string|max:20|unique:publisher,Phone',
            'Address' => 'required|string|max:250'
        ], [
            'Name.required' => 'Thiếu tên nhà xuất bản',
            'Name.unique' => 'Tên nhà xuất bản đã tồn tại.',
            'Name.max' => 'Tên nhà xuất bản không được dài quá 50 ký tự.',

            'Email.required' => 'Email là bắt buộc.',
            'Email.unique' => 'Email này đã được sử dụng.',
            'Email.max' => 'Email không được dài quá 100 ký tự.',

            'Phone.required' => 'Số điện thoại là bắt buộc.',
            'Phone.unique' => 'Số điện thoại này đã được sử dụng.',
            'Phone.max' => 'Số điện thoại không được dài quá 20 ký tự.',

            'Status.required' => 'Thông tin là bắt buộc.',
            'Status.max' => 'Thông tin không được dài quá 250 ký tự.',
            
            'Address.required' => 'Thông tin là bắt buộc.',
            'Address.max' => 'Địa chỉ không được dài quá 250 ký tự.',

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
             'Status'  => $request->Status  ,
             'Address'  => $request->Address  ,
             'Email'  => $request->Email ,
             'Phone'  => $request->Phone ,
             'IsActive'  => $request->has('IsActive') ? 1 : 0
             // ....
         ];
        
        $publis = Publisher::create($inputData); 
        return redirect()->route("show_list_publis");
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
        $publis=Publisher::find($id);
         return view('admin.pages.Publisher.edit',['publis'=>$publis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $rqt, string $id)
    {
        $publis = Publisher::findOrFail($id);
        
        $inputData=[
            'Name'=>$rqt->Name ?? $publis->Name,
            'Status'=>$rqt->Status ?? $publis->Status,
            'Address'=>$rqt->Address ?? $publis->Address,
            'Email'=>$rqt->Email ?? $publis->Email,
            'Phone'=>$rqt->Phone ?? $publis->Phone,
            'IsActive'     => $rqt->has('IsActive') ? 1 : 0 
        ];
        
        
        $publis->update($inputData);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật danh mục thành công"]);
        return redirect()->route("show_list_publis");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publis = Publisher::find($id);
        if($publis){
            $publis->delete();
            return response()->json(['success'=>true,'message' => 'Xóa thể loại thành công']);
        }
        return response()->json(['success'=>false,'message' => 'Thể loại không tồn tại']);
    }
}
