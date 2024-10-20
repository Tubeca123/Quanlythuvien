<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.User.register');
    }
    public function login()
    {
        return view('admin.pages.User.login');
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
    public function store(Request $rqt)
{
    $validator = Validator::make($rqt->all(), [
        'sv_id' => 'required|string|max:20|unique:users,sv_id',
        'email' => 'required|email|max:100|unique:users,email',
        'name' => 'required|string|max:50',
        'password' => 'required|string|min:3|max:20|confirmed',
        'password_confirmation' => 'required|string|min:3|max:20'
    ], [
        'sv_id.required' => 'Mã sinh viên là bắt buộc.',
        'sv_id.unique' => 'Mã sinh viên đã tồn tại.',
        'sv_id.max' => 'Mã sinh viên không được dài quá 20 ký tự.',
        'email.required' => 'Email là bắt buộc.',
        'email.unique' => 'Email này đã được sử dụng.',
        'email.max' => 'Email không được dài quá 100 ký tự.',
        'name.required' => 'Họ tên là bắt buộc.',
        'name.max' => 'Họ tên không được dài quá 50 ký tự.',
        'password.required' => 'Mật khẩu là bắt buộc.',
        'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự.',
        'password.max' => 'Mật khẩu không được dài quá 20 ký tự.',
        'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu xác nhận.',
        'password_confirmation.min' => 'Mật khẩu xác nhận phải có ít nhất 3 ký tự.',
        'password_confirmation.max' => 'Mật khẩu xác nhận không được vượt quá 20 ký tự.'
    ]);
     
    // Kiểm tra xem xác thực có thất bại không
    if ($validator->fails()) {
        
        return back()
            ->withErrors($validator)
            ->withInput(); // Giữ lại input mà người dùng đã nhập
    }
    $existsInStudens = Student::where('Ma_sv', $rqt->sv_id)->exists();

    if (!$existsInStudens) {
        // Nếu không tồn tại sv_id trong bảng students, thông báo lỗi
        return back()->withErrors(['sv_id' => 'Mã sinh viên này không thuộc sinh viên trường.'])->withInput();
    }
    // Tạo mới người dùng
    $user = new User;
    $user->SV_id = $rqt->sv_id; 
    $user->Full_name = $rqt->name; 
    $user->Email = $rqt->email; 
    $user->Role_id = $rqt->role; 
    $user->Pw = Hash::make($rqt->password); 
    $user->Create_date = now(); 
    $user->IsAction = 1; 

    // Lưu người dùng vào cơ sở dữ liệu
    if ($user->save()) {
        // Thông báo thành công và chuyển hướng
        $rqt->session()->put("message", ["style" => "success", "msg" => "Đăng ký tài khoản thành công"]); 
    } else {
        // Thông báo lỗi
        $rqt->session()->put("message", ["style" => "danger", "msg" => "Đã xảy ra lỗi khi lưu thông tin."]); 
    }
    return redirect()->route("login");
}
    public function handlogin( Request $rqt)
    {
        
         $rqt->validate([
            'SV_id' => ['required'],
            'password' => ['required'],
        ]);
        
        if ($user = User::where("SV_id", $rqt->SV_id)->first()) {
            // dd($user);
            if (Hash::check($rqt->password, $user->Pw)) {

                Auth::login($user);
                return redirect()->route("quanlytv");
            }else{
                dd("mk không đúng");
            }
        }
        dd($rqt);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    { 
        $user = User::all();
        // $user = User::where('Role_id',2)->get();
        return view('admin.pages.User.list',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function profile(string $id)
    {
        // dd($id);
        $user = User::find($id);
        // $user = User::where('Role_id',2)->get();
        return view('admin.pages.User.profile',['user'=>$user]);
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
    public function lockuser(string $id)
    {
        $user = User::find($id);
        
        if ($user) {
            $user->IsAction = 0;
            $user->save();  
            
            return response()->json(['success' => true, 'message' => 'Khóa người dùng thành công']);
        }
        
        return response()->json(['success' => false, 'message' => 'Người dùng không tồn tại']);
    }
    public function roleuser(string $id)
    {
        $user = User::find($id);
        
        if ($user) {
            $user->Role_id = 2;
            $user->save();  
            
            return response()->json(['success' => true, 'message' => 'Phân quyền thành công']);
        }
        
        return response()->json(['success' => false, 'message' => 'Người dùng không tồn tại']);
    }
    public function  handleLogout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('welcome'); // Chuyển hướng về trang đăng nhập hoặc trang khác
    }
    
}
