@extends('admin.master_layout')

@section('page_content')
<style>
    div.dataTables_filter {
        float: right;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- END SIDEBAR-->
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title"></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
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
                    @foreach($pn as $pn)
                    <tr id="row_{{ $pn->Id }}">
                        <td>{{$pn->book->Name}}</td>
                        <td>{{$pn->Status}}</td>
                        
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            language: {
                lengthMenu: "Hiển thị _MENU_ ",
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
</script>

@endsection