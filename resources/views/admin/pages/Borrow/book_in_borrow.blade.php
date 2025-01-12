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
                                <span class="font-strong">Mã sinh viên:</span>{{ $sv->user->SV_id}}
                            </li>
                            <li class="m-b-5">
                                <span class="font-strong">Tên1:</span>{{ $sv->user->Full_name}}
                            </li>
                            <li class="m-b-5">
                                <span class="font-strong">Email:</span>{{ $sv->user->Email}}
                            </li>
                            <li>
                                <span class="font-strong">Số điện thoại:</span> {{ $sv->user->Phone}}
                            </li>

                        </ul>
                    </div>

                </div>

            </div>
        </div>

        <form id="return-form">
            <table class="table table-striped no-margin table-invoice">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $bor)
                    <tr>
                        <td><img src="{{ $bor->book->Image }}" alt="" style="width: 80px; height: 80px"></td>
                        <td>{{ $bor->book->Name }}</td>
                        <td>
                            <label>
                                <input type="radio" name="status_{{ $bor->book->Id }}" value="1" checked> Sách nguyên vẹn
                            </label>
                            <label>
                                <input type="radio" name="status_{{ $bor->book->Id }}" value="2"> Sách bị tổn hại
                            </label>
                            <label>
                                <input type="radio" name="status_{{ $bor->book->Id }}" value="0"> Mất sách
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table no-border">
                <thead>-
                    <tr>
                        <th></th>
                        <th width="15%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-right">
                        <td class="font-bold font-18">Ngày mượn:</td>
                        <td class="font-bold font-18">{{ $br->Create_date }}</td> <!-- Hiển thị ngày hiện tại -->
                    </tr>
                    <tr class="text-right">
                        <td class="font-bold font-18">Ngày trả của phiếu mượn:</td>
                        <td class="font-bold font-18">{{ $br->Return_date }}</td> <!-- Hiển thị ngày hiện tại -->
                    </tr>
                    <tr class="text-right">
                        <td class="font-bold font-18">Ngày trả:</td>
                        <td class="font-bold font-18">{{ \Carbon\Carbon::now()->format('Y-m-d') }}</td> <!-- Thay thế bằng biến chứa ngày trả -->
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <button class="btn btn-primary" type="button" onclick="window.history.back();">
                    <i></i> Quay lại
                </button>

                <button id="traphieu" type="button" class="btn btn-primary" onclick="submitReturnForm()">
                    <i></i> Trả phiếu
                </button>
                <a id="check" href="{{route('view_borrow', ['Id'=>$br['Id']])}}" style="display: none;" type="button" class="btn btn-primary">
                    <i></i> Chi tiết
                </a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function submitReturnForm() {
        const formData = $('#return-form').serialize();

        $.ajax({
            url: "{{ route('return_borrow', $br->Id) }}",
            type: "POST",
            data: formData + "&_token={{ csrf_token() }}",
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Phiếu trả đã được tạo thành công",

                        toast: true,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('#traphieu').hide();
                    $('#check').show();
                } else {
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại!');
                }
            },
            error: function() {
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại!');
            }
        });
    }
</script>
@endsection