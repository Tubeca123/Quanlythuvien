<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport; 

use Illuminate\Http\Request;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new StudentImport(), $request->file('file'));
        return redirect()->route('show_list_users')->with('success', 'Đã thêm danh sách sinh viên thành công.');
        // return response()->json(['success' => true, 'message' => 'Đã thêm danh sách sinh viên thành công.']);
        // return back();
    }
}
