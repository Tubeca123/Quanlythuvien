@extends('admin.master_layout')

@section('page_content')
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Thêm nhà xuất bản</h1>
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
                        <form class="form-horizontal" action="{{route("handle_create_publis")}}" method="post"  id="form-sample-1"  novalidate="novalidate">
                             @csrf 
                             
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên nhà xuất bản</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="Name" value="{{ old('Name') }}">
                                    @error('Name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Thông tin</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="Status" value="{{ old('Status') }}">
                                    @error('Status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="Address" value="{{ old('Address') }}">
                                    @error('Address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="Email" value="{{ old('Email') }}">
                                    @error('Email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="Phone" value="{{ old('Phone') }}">
                                    @error('Phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                    <button class="btn btn-info" type="submit">Tạo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            <!-- END PAGE CONTENT-->
            
@endsection