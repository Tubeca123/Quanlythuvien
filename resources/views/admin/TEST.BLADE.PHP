@extends('admin.master_layout')

@section('page_content')
<main id="main" class="main">
    <div class="container shadow p-5">
        <div class="row pb-2">
            <h2>Sửa thông tin sách</h2>
        </div>

        <!-- Laravel form -->
        <form method="POST" action="{{ route('update_book', ['Id' => $books->Id]) }}"  >
            @csrf
            @method('PUT')
            <input type="hidden" name="Id" value="{{$books->Id }}">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tên </label>
                <div class="col-sm-10">
                    <input name="Name" type="text" class="form-control" value="{{ old('Name', $books->Name) }}" placeholder="Mời nhập">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Thông tin </label>
                <div class="col-sm-10">
                    <input name="Name" type="text" class="form-control" value="{{ old('About', $books->About) }}" placeholder="Mời nhập">
                </div>
            </div>




            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thể loại</label>
                <div class="col-sm-10">
                    <select class="form-control" name="Categories_id" required>
                        <option value="">Chọn thể loại</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->Id }}" {{ old('Categories_id', $books->Categories_id) == $category->Id ? 'selected' : '' }}>
                                {{ $category->Name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nhà xuất bản</label>
                <div class="col-sm-10">
                    <select class="form-control" name="Publisher_id" required>
                        <option value="">Chọn nhà xuất bản</option>
                        @foreach($publis as $publis)
                            <option value="{{ $publis->Id }}" {{ old('Publisher_id', $books->Publisher_id) == $publis->Id ? 'selected' : '' }}>
                                {{ $publis->Name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="Quantity" value="{{ old('Quantity', $books->Quantity) }}">
                </div>
            </div>
            

            
            <!-- Ngày thêm -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày thêm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Created_date" value="{{ $books->Create_date }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tác giả</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="author" value="{{ old('author', $books->author) }}">
                </div>
            </div>

            <!-- Người thêm -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Người thêm</label>
                <div class="col-sm-10">
                    <input name="Create_by" type="text" class="form-control" value="{{ old('Create_by', $books->Create_by) }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nhà xuất bản</label>
                <div class="col-sm-10">
                    <input name="Create_by" type="text" class="form-control" value="{{ old('Publised_name', $books->Publised_name) }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Năm sản xuất</label>
                <div class="col-sm-10">
                    <input name="Create_by" type="text" class="form-control" value="{{ old('Publised_year', $books->Publised_year) }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Người thêm</label>
                <div class="col-sm-10">
                    <input name="Create_by" type="text" class="form-control" value="{{ old('Create_by', $books->Create_by) }}" readonly>
                </div>
            </div>

            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày thêm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Update_date" value="{{ old('Create_date', $books->Create_date) }}" readonly>
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
                    <input type="checkbox" name="IsActive" {{ old('IsActive', $books->IsActive) ? 'checked' : '' }}>
                    Hiển thị
                </label>
            </div>

            <!-- Nút lưu -->
            <button type="submit" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i> Lưu</button> 
            <a href="{{route('show_list_book') }}" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
</main>



            
@endsection