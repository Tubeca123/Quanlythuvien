@extends('admin.master_layout')

@section('page_content')
<script src="{{asset("assets/vendors/jquery/dist/jquery.min.js")}}" type="text/javascript"></script>
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Sửa thông tin sách </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
    </ol>
</div>
<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" method="POST" action="{{ route('update_book', ['Id' => $books->Id]) }}"  novalidate="novalidate">
                @csrf
                @method('PUT')
                <input id="thumbnail" class="form-control" value="{{$books->Image }}" type="text" name="img">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Right Column: Book cover image -->
                        <div class="flex-shrink-0">
                            <div class="card border border-gray-200 rounded-lg shadow-md">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- User profile image -->
                                        <img id="holder" class="rounded-full object-cover mx-auto"
                                            src=""
                                            alt=""
                                            style="width: 250px; height: 250px;">

                                        <!-- Upload image button -->
                                        <div class="mt-4">
                                            <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info btn-circle">
                                                <i class="fa fa-upload"></i> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên sách</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="Name" value="{{ old('Name', $books->Name) }}">
                                @error('Name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Thông tin -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Thông tin</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="About" value="{{ old('About', $books->About) }}">
                                @error('About')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Thể loại -->
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

                        <!-- Nhà xuất bản -->
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
                                @error('Publisher_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">

                    <div class="form-group row">
                        <label class="col-lg-2">Số lượng nhập</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="Quantity" value="{{ old('Quantity', $books->Quantity) }}">
                            @error('Quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <!-- Giá trị -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giá trị</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="Price" value="{{ old('Price', $books->Price) }}">
                            @error('Price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tác giả -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tác giả</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="author" value="{{ old('author', $books->author) }}">
                            @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Năm xuất bản -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Năm xuất bản</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="Publised_year" value="{{ old('Publised_year', $books->Publised_year) }}">
                            @error('Publised_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Người thêm -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người thêm</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="Create_by" readonly value="{{ old('Create_by', $books->Create_by) }}">
                            @error('Create_by')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người sửa</label>
                        <div class="col-sm-10">
                            <!-- <input class="form-control" type="text" name="Update_by" value="{{ old('Update_by', $books->Update_by) }}"> -->
                            <input class="form-control" type="text" name="Update_by"  value="{{ old('Update_by', $books->Update_by) }}">
                            @error('Update_by')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group at-3 mb-5">
                    <label>
                        <input type="checkbox" name="IsActive" value="1" {{ old('IsActive') ? 'checked' : '' }}>
                        Hiển thị
                    </label>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-info" type="submit">Lưu</button>
                    </div>
                </div>
            </form>




            <!-- Additional form fields below the image -->


        </div>


    </div>

</div>
<!-- END PAGE CONTENT-->

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image', {
        prefix: '/file-manager'
    });
    var initialUrl = $('#thumbnail').val();
    if (initialUrl) {
        $('#holder').attr('src', initialUrl);
    } else {
        $('#holder').attr('src', '/storage/photos/2/Image_book/img/image.jpg');
    }
    $('#lfm').filemanager('image');
    $('#lfm').on('click', function() {

        var route_prefix = '/file-manager';
        window.open(route_prefix + '?type=image', 'FileManager', 'width=700,height=400');
        window.SetUrl = function(items) {
            var url = items[0].url;
            $('#holder').attr('src', url);
            $('#thumbnail').val(url);
        };
        

    });
</script>
@endsection