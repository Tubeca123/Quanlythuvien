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
                                <span class="font-strong">Tên:</span> {{Auth::user()->Id}}
                            </li>
                            <li class="m-b-5">
                                <span class="font-strong">Email:</span>{{Auth::user()->Email }}
                            </li>
                            <li>
                                <span class="font-strong">Số điện thoại:</span> {{Auth::user()->Phone }}
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; @endphp
                @if (session('borrow'))
                @foreach (session('borrow') as $id => $items)
                <tr id="detail-{{ $id }}">
                    <td><img src="{{ $items['image'] }}" alt="" style="width: 80px; height: 80px"></td>
                    <td>{{ $items['name'] }}</td>

                    <td>
                        <a class="btn btn-default btn-xs m-r-5" data-id="{{ $id}}" title="Xem chi tiết">
                            <i class="fa fa-eye font-14"></i></a>
                        <a class="btn btn-danger btn-sm btn-trash" data-id="{{ $id}}" title="Xóa ">
                            <i class="ti ti-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
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
                    <td class="font-bold font-18">Ngày mượn:</td>
                    <td class="font-bold font-18">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</td> <!-- Hiển thị ngày hiện tại -->
                </tr>
                <tr class="text-right">
                    <td class="font-bold font-18">Ngày trả:</td>
                    <td class="font-bold font-18">{{ \Carbon\Carbon::now()->addMonth()->format('d/m/Y') }}</td> <!-- Thay thế bằng biến chứa ngày trả -->
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button class="btn btn-add-borrow" type="button"><i class="fa fa-print"></i> Mượn sách</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {

        $('body').on('click', '.btn-trash', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: "Xác nhận xóa khỏi phiếu mượn",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/remove_book/" + id,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            $('#detail-' + id).remove();
                        },
                        error: function(xhr) {
                            toastr.error('Có lỗi khi xóa thiết bị');
                        }
                    });
                }
            });
        })


        $('body').on('click', '.btn-add-borrow', function(e) {
            let mainDescription = $('#main-description').val();
            $.ajax({
                url: '/create_borrow',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    description: mainDescription
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Tạo phiếu mượn thành công!');
                        $('#modal-default2').modal('hide');
                        $('#main-description').val('');
                        $('#example-table tbody').empty();
                    } else if (response.error) {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);  // In ra console để kiểm tra chi tiết lỗi
                    alert('Có lỗi xảy ra: ' + xhr.responseText);  // Hiển thị lỗi trong alert
                }
            });
        });

        setTimeout(function() {
            $("#myAlert").fadeOut(500);
        }, 3500);
    })
</script>
@endsection