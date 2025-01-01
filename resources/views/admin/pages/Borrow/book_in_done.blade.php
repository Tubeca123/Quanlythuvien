@extends('clinet.master_layout')
@section('page_content')

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Phiếu mượn</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Thông tin phiếu </li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox invoice">
        <div class="invoice-header">
            <div class="row">
                <div class="col-6">

                    <div>
                        <div class="m-b-5 font-bold">Thông tin sinh viên </div>
                        <ul class="list-unstyled m-t-10">
                            <li class="m-b-5">
                                <span class="font-strong">Tên:</span>{{ $sv->user->Full_name}}
                            </li>
                            <li class="m-b-5">
                                <span class="font-strong">Email:</span>{{$sv->user->Email }}
                            </li>
                            <li>
                                <span class="font-strong">Số điện thoại:</span> {{$sv->user->Phone }}
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>


        <table class="table table-striped no-margin table-invoice">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sách</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($br as $bor)
                <tr>
                    <td><img src="{{ $bor->book->Image }}" alt="" style="width: 80px; height: 80px"></td>
                    <td>{{ $bor->book->Name }}</td>
                    
                        @if ($bor->Status == 0)
                        <td class="danger">Làm mất sách</td>
                        @elseif ($bor->Status == 1)
                        <td class="success">Tốt</td>
                        @else
                        <td class="warning">Hư hại</td>
                        @endif
                    <td>
                        <a class="btn btn-default btn-xs m-r-5" title="Xem chi tiết">
                            <i class="fa fa-eye font-14"></i></a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table no-border">
            <thead>
                <tr>
                    <th></th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-right">
                    <td class="font-bold font-18">Hạn trả:</td>
                    <td class="font-bold font-18">{{ $br_ok->Return_date }}</td> <!-- Hiển thị ngày hiện tại -->
                </tr>
                <tr class="text-right">
                    <td class="font-bold font-18">Ngày trả trả:</td>
                    <td class="font-bold font-18">{{ $br_ok->Create_date }}</td> <!-- Thay thế bằng biến chứa ngày trả -->
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button class="btn btn-primary" type="button" onclick="window.history.back();">
                <i></i> Quay lại
            </button>
        </div>

    </div>


    <style>
        .invoice {
            padding: 20px
        }

        .invoice-header {
            margin-bottom: 50px
        }

        .invoice-logo {
            margin-bottom: 50px;
        }

        .table-invoice tr td:last-child {
            text-align: right;
        }
    </style>

</div>

@endsection