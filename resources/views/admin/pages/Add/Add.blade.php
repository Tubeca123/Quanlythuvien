@extends('admin.master_layout')
@section('page_content')
<div class="content-wrapper rows d-flex ">
    <div class="col-8">
        @include('admin.pages.Add.index')
    </div>
    <div class="col-4">
        <!-- START PAGE CONTENT-->
        <div class="page-heading" style="margin-top: 34px;">
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
                                    <li class="m-b-5 d-flex align-items-center">
                                        <label for="student_id">ID:</label>
                                        <div class="d-flex">
                                            <input type="text" name="student_id" id="student_id" class="form-control" />
                                            <button class="btn btn-primary btn-search-student" id="search-student">Tìm kiếm</button>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-unstyled m-t-10" id="student-info">
                                    <li class="m-b-5">
                                        <span class="font-strong">Tên:</span> <span id="student-name">Chưa có thông tin</span>
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
                    <tbody id="show_detail">
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
                        @else
                        <div class="alert alert-warning" id="ifchua">Chưa có sách mượn.</div>
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
                <div class="text-right ">
                    <button class="btn btn-primary btn-add-borrow1" type="button"><i></i>Tạo phiếu mượn </button>
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
    </div>


</div>
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


        $('body').on('click', '.btn-add-borrow1', function(e) {
            let mainDescription = $('#main-description').val();

            let studentId = $('#student_id').val().trim();

            if (!studentId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Vui lòng nhập ID sinh viên!',
                });
                return;
            }
            $.ajax({
                url: '/admin/admin-create_borrow',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    description: mainDescription,
                    student_id: studentId,
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Tạo phiếu mượn thành công!');
                        // $('#modal-default2').modal('hide');
                        // $('#main-description').val('');
                        // $('#example-table tbody').empty();
                        document.getElementById('show_detail').innerHTML = "";
                    } else if (response.error) {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // In ra console để kiểm tra chi tiết lỗi
                    alert('Có lỗi xảy ra: ' + xhr.responseText); // Hiển thị lỗi trong alert
                }
            });
        });

        setTimeout(function() {
            $("#myAlert").fadeOut(500);
        }, 3500);
    })

    $(document).ready(function() {
        $('body').on('click', '.btn-search-student', function() {
            let studentId = $('#student_id').val().trim();

            if (!studentId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Vui lòng nhập ID sinh viên!',
                });
                return;
            }

            // Gửi AJAX
            $.ajax({
                url: "/admin/search_student/" + studentId,
                type: "GET",
                success: function(response) {
                    if (response.success) {
                        // Cập nhật thông tin sinh viên lên giao diện
                        $('#student-name').text(response.student.name || 'Không có tên');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Không tìm thấy!',
                            text: response.message,
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: 'Có lỗi xảy ra. Vui lòng thử lại!',
                    });
                }
            });
        });
    });
</script>
@endsection