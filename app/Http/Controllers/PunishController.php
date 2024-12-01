<?php

namespace App\Http\Controllers;

use App\Models\Punish;
use Illuminate\Http\Request;

class PunishController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    // Lấy danh sách ID phiếu phạt từ request
    $punishIds = $request->input('punish_ids', []);

    // Kiểm tra nếu có ID nào được gửi đến
    if (!empty($punishIds)) {
        foreach ($punishIds as $id) {
            $br = Punish::find($id);  // Tìm phiếu trả theo ID

            if ($br) {
                // Cập nhật trạng thái của phiếu trả thành "đã trả" (hoặc một trạng thái khác)
                $br->Status = 4;  // Trạng thái "4" có thể là "hoàn thành" hoặc "đã trả"
                $br->save();  // Lưu thay đổi vào cơ sở dữ liệu
            }
        }

        // Trả về phản hồi JSON
        return response()->json(['success' => true, 'message' => 'Phiếu phạt đã được trả thành công!']);
    } else {
        // Trả về lỗi nếu không có phiếu phạt nào được chọn
        return response()->json(['success' => false, 'message' => 'Không có phiếu phạt nào được chọn.']);
    }
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
