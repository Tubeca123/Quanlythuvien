@extends('admin.master_layout')

@section('page_content')

   
        <div class="row pb-2">
            <h2>Sửa thể loại</h2>
        </div>

        <!-- Laravel form -->
        <form method="POST" action="{{ route('update_category', ['Id' => $categories->Id]) }}"  >
            @csrf
            @method('PUT')
            <!-- ID thể loại (ẩn) -->
            <input type="hidden" name="Id" value="{{$categories->Id }}">

            <!-- Tên thể loại -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tên thể loại</label>
                <div class="col-sm-10">
                    <input name="Name" type="text" class="form-control" value="{{ old('Name', $categories->Name) }}" placeholder="Mời nhập">
                </div>
            </div>

            <!-- Alias -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Thông tin</label>
                <div class="col-sm-10">
                    <input name="About" type="text" class="form-control" value="{{ old('About', $categories->About) }}" placeholder="Nhập link">
                </div>
            </div>

           

            

            <!-- Hình ảnh -->
            

            
            <!-- Ngày thêm -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày thêm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Created_date" value="{{ $categories->Create_date }}" readonly>
                </div>
            </div>

            <!-- Người thêm -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Người thêm</label>
                <div class="col-sm-10">
                    <input name="Create_by" type="text" class="form-control" value="{{ old('Create_by', $categories->Create_by) }}" readonly>
                </div>
            </div>

            <!-- Ngày sửa -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày sửa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Update_date" value="{{ \Carbon\Carbon::now() }}" readonly>
                </div>
            </div>

            <!-- Người sửa -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Người sửa</label>
                <div class="col-sm-10">
                    <input name="Update_by" type="text" class="form-control" value="{{ old('Update_by') }}" placeholder="Nhập người sửa">
                </div>
            </div>

            <!-- Hiển thị -->
            <div class="form-group at-3 mb-5">
                <label>
                    <input type="checkbox" name="IsActive" {{ old('IsActive', $categories->IsActive) ? 'checked' : '' }}>
                    Hiển thị
                </label>
            </div>

            <!-- Nút lưu -->
            <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i> Lưu</button> 
            <a href="{{ route('show_list_category') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>



            
@endsection