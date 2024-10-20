@extends('admin.master_layout')

@section('page_content')
<style>
    div.dataTables_filter {
        float: right;
    }
</style>
    <!-- Liên kết CSS cho Bootstrap, Datatables và các thư viện khác -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- START PAGE CONTENT -->
    <div class="page-heading">
        <h1 class="page-title">Danh sách</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <a class="btn btn-success" href="{{route('create_book')}}" target="_blank">Thêm mới</a>

            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tên sách</th>
                            <th>Thông tin</th>
                            <th>Thể loại</th>
                            <th>Nhà xuất bản</th>
                            <th>Số lượng</th>
                            <th>Tác giả</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sách</th>
                            <th>Thông tin</th>
                            <th>Thể loại</th>
                            <th>Nhà xuất bản</th>
                            <th>Số lượng</th>
                            <th>Tác giả</th>
                            <th>Trạng thái</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($books as $book)
                        <tr id="row_{{ $book->Id }}">
                            <td>{{ $book->Name }}</td>
                            <td>{{ $book->About }}</td>
                            <td>{{ $book->Category ? $book->Category->Name : 'Không có thể loại' }}</td>
                            <td>{{ $book->Publisher ? $book->Publisher->Name : 'Không có thể loại' }}</td>
                            <td>{{ $book->Quantity }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <a class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Sửa" href="{{route('edit_book', ['Id'=>$book['Id']])}}">
                                    <i class="fa fa-pencil font-14"></i></a>
                                <a class="btn btn-danger btn-sm btn-delete" data-id="{{ $book->Id }}" title="Xóa">
                                    <i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

    <!-- Liên kết JavaScript cho jQuery, Datatables, Bootstrap và SweetAlert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#example-table').DataTable({
                pageLength: 10,
                language: {
                    lengthMenu: "Hiển thị _MENU_ mục",
                    search: "Tìm kiếm:",
                    zeroRecords: "Không tìm thấy dữ liệu",
                    info: "Hiển thị từ _START_ đến _END_ của _TOTAL_ mục",
                    infoEmpty: "Hiển thị từ 0 đến 0 của 0 mục",
                    infoFiltered: "(được lọc từ _MAX_ tổng số mục)",
                    paginate: {
                        first: "Đầu",
                        last: "Cuối",
                        next: "Tiếp",
                        previous: "Trước"
                    }
                }
            });
        });

        $(document).ready(function () {
            $('body').on('click', '.btn-delete', function () {
                let _id = $(this).data("id");

                Swal.fire({
                    title: "Xác nhận xóa Thể loại?",
                    text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Xóa",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/destroy_books/" + _id,
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: "Xóa thành công",
                                        toast: true,
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    $('#row_' + _id).remove();
                                } else {
                                    toastr.error('Xóa không thành công');
                                }
                            },
                            error: function () {
                                toastr.error('Có lỗi xảy ra. Vui lòng thử lại!');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
