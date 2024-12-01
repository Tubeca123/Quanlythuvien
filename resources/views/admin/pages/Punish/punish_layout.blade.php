@extends('admin.master_layout')

@section('page_content')

<!-- END SIDEBAR-->
<div class="content-wrapper rows d-flex ">
    <div class="col-6">
        <div class="page-heading" style="margin-top: 34px;">
            <h1 class="page-title">Chi tiết phiếu trả</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Thông tin phiếu trả</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tên sách</th>
                                <th>Tình trạng</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên sách</th>
                                <th>Tình trạng</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($br_rt as $item)
                            <tr>
                                <td>{{ $item->book->Name }}</td>
                                @if($item->Status == 1)
                                <td><button class="btn btn-success"> Tốt</button></td>
                                @elseif($item->Status == 2)
                                <td><button class="btn btn-warning"> Tổn thất sách</button></td>
                                @else
                                <td><button class="btn btn-danger"> Mất sách</button></td>
                                @endif
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-6">
        <!-- START PAGE CONTENT-->
        <div class="page-heading" style="margin-top: 34px;">
            <h1 class="page-title">Phiếu phạt</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Thông tin phiếu phạt nếu có</li>
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
                                        <span class="font-strong">Mã sinh viên:</span> {{$sv->user->SV_id }}
                                    </li>
                                    <li class="m-b-5">
                                        <span class="font-strong">Tên:</span> {{$sv->user->Full_name }}
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

                <form id="punishForm" method="POST" action="{{ route('punish.create') }}">
                @csrf
                @method('PUT')
                <table class="table table-striped no-margin table-invoice">
                    <thead>
                        <tr>
                            <th>Tên sách </th>
                            <th>Mức phạt</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <form id="punishForm" method="POST" action="{{ route('punish.create') }}">
                    @csrf 
                        @if (!$pn)
                        <div class="alert alert-warning" id="ifchua">Không có phiếu phạt.</div>
                       
                        @else
                         @foreach ($pn as $pn)
                        <tr id="row_{{ $pn->Id }}">
                            <input type="hidden" name="punish_ids[]" value="{{ $pn->Id }}">
                            <td>{{ $pn->return_detail->book->Name }}</td>

                            @if($pn->return_detail->Status == 2)
                                <td>{{ $pn->return_detail->book->Price *0.2 }}</td>
                                @else
                                <td>{{ $pn->return_detail->book->Price }}</td>
                                @endif
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>


                <div class="text-right ">
                    <button class="btn btn-primary btn-done" type="button" id="writePunishBtn"><i></i>Viết phiếu</button>
                </div>
                </form>
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
    </div>


</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.full.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/bootstrap-duallistbox.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/jquery.bootstrap-duallistbox.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

$('#writePunishBtn').on('click', function() {
    // Lấy dữ liệu form
    const formData = $('#punishForm').serialize();  // Serialize form để lấy dữ liệu ID của các phiếu phạt

    $.ajax({
        url: "{{ route('punish.create') }}", // Đảm bảo đường dẫn đúng với route của bạn
        type: "POST",
        data: formData + "&_token={{ csrf_token() }}", // Thêm token CSRF để bảo mật
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Phiếu phạt đã được trả!",
                    toast: true,
                    showConfirmButton: false,
                    timer: 1000
                });

                // Reset form nếu cần
                $('#punishForm')[0].reset();
            } else {
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại!');
            }
        },
        error: function() {
            toastr.error('Có lỗi xảy ra. Vui lòng thử lại!');
        }
    });
});
</script>
@endsection