@extends('admin.master_layout')

@section('page_content')

   
        <div class="row pb-2">
            <h2>Sửa thông tin nhà xuất bản</h2>
        </div>

        <!-- Laravel form -->
        <form method="POST" action="{{ route('update_publis', ['Id' => $publis->Id]) }}"  >
            @csrf
            @method('PUT')
            <!-- ID thể loại (ẩn) -->
            <input type="hidden" name="Id" value="{{$publis->Id }}">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tên </label>
                <div class="col-sm-10">
                    <input name="Name" type="text" class="form-control" value="{{ old('Name', $publis->Name) }}" placeholder="Mời nhập">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Thông tin</label>
                <div class="col-sm-10">
                    <input name="Status" type="text" class="form-control" value="{{ old('Status', $publis->Status) }}" placeholder="Nhập thông tin">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input name="Address" type="text" class="form-control" value="{{ old('Address', $publis->Address) }}" placeholder="Nhập thông tin">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="Email" type="text" class="form-control" value="{{ old('Email', $publis->Email) }}" placeholder="Nhập thông tin">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input name="Phone" type="text" class="form-control" value="{{ old('Phone', $publis->Phone) }}" placeholder="Nhập thông tin">
                </div>
            </div>
           

            

            <!-- Hình ảnh -->
            

            
            <!-- Ngày thêm -->
            <!-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày thêm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Created_date" value="{{ $publis->Create_date }}" readonly>
                </div>
            </div> -->

            <!-- Người thêm -->
            <!-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Người thêm</label>
                <div class="col-sm-10">
                    <input name="Create_by" type="text" class="form-control" value="{{ old('Create_by', $publis->Create_by) }}" readonly>
                </div>
            </div> -->

            <!-- Ngày sửa -->
            <!-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày sửa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Update_date" value="{{ \Carbon\Carbon::now() }}" readonly>
                </div>
            </div> -->

            <!-- Người sửa -->
            <!-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Người sửa</label>
                <div class="col-sm-10">
                    <input name="Update_by" type="text" class="form-control" value="{{ old('Update_by') }}" placeholder="Nhập người sửa">
                </div>
            </div> -->

            <!-- Hiển thị -->
            <div class="form-group at-3 mb-5">
                <label>
                    <input type="checkbox" name="IsActive" {{ old('IsActive', $publis->IsActive) ? 'checked' : '' }}>
                    Hiển thị
                </label>
            </div>

            <!-- Nút lưu -->
            <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i> Lưu</button> 
            <a href="{{ route('show_list_publis') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>



            
@endsection