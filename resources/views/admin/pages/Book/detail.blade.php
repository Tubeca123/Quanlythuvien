@extends('admin.master_layout')

@section('page_content')


<style>
        .book-image {
            width: 200%;
            height: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .book-details {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .details-label {
            font-weight: bold;
            color: #555;
        }
    </style>
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Thông tin sách</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
    </ol>
</div>

<div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ $books->Image ? asset($books->Image) : asset('images/default-book.png') }}" 
                     alt="Book Image" class="book-image">
            </div>
            <div class="col-md-8">
                <div class="book-details">
                    <h2 class="text-primary mb-4">{{ $books->Name }}</h2>

                    <p><span class="details-label">Thông tin:</span> {{ $books->About }}</p>
                    <p><span class="details-label">Số lượt mượn:</span> {{ $books->About }}</p>
                    
                    <p><span class="details-label">Thể loại:</span> {{ $books->Category ? $books->Category->Name : 'Không có thể loại' }}</p>
                    
                    <p><span class="details-label">Nhà xuất bản:</span> {{ $books->Publisher ? $books->Publisher->Name : 'Không có nhà xuất bản' }}</p>

                    <p><span class="details-label">Giá trị:</span> {{ number_format($books->Price, 0, ',', '.') }} VND</p>

                    <p><span class="details-label">Tác giả:</span> {{ $books->author }}</p>

                    <p><span class="details-label">Năm xuất bản:</span> {{ $books->Publised_year }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-end">
                <a  class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
<!-- END PAGE CONTENT-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
