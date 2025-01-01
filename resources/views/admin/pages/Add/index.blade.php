<style>
    div.dataTables_filter {
        float: right;
    }
</style>


<!-- START PAGE CONTENT -->
<div class="page-heading">
    <h1 class="page-title">Danh sách</h1>
    <ol class="breadcrumb">
        <li class="">
            <a href="{{route('br_detail')}}"><button class="btn btn-success btn-fix "> Phiếu mượn</button><i class="la la-home font-20"></i></a>
        </li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Thể loại</th>
                        <th>Nhà xuất bản</th>
                        <th>Tác giả</th>
                        <th>Trạng thái</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Thể loại</th>
                        <th>Nhà xuất bản</th>
                        <th>Tác giả</th>
                        <th>Trạng thái</th>
                        <th>Công cụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($books as $book)
                    <tr id="row_{{ $book->Id }}">
                        <td>
                        <a href="{{route('detail_book',['Id'=>$book['Id']])}}" >
                                <img src="{{ $book->Image }}"  class="img-thumbnail" style="width: 100px; height: auto;">
                            </a>
                        </td>
                        <td>{{ $book->Name }}</td>
                        <td>{{ $book->Category ? $book->Category->Name : 'Không có thể loại' }}</td>
                        <td>{{ $book->Publisher ? $book->Publisher->Name : 'Không có thể loại' }}</td>
                        <td>{{ $book->author }}</td>
                        @if($book->Stock >0)
                        <td><button class="btn btn-success"> vẫn còn</button></td>
                        <td>
                            <a class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" title="Xem chi tiết">
                                <i class="fa fa-eye font-14"></i></a>
                            <a class="btn btn-success btn-sm btn-plus" data-id="{{ $book->Id }}" title="Mượn">
                                <i class="ti ti-plus"></i></a> 
                        </td>
                        @else
                        <td><button class="btn btn-warning"> hết sách</button></td>
                        <td>
                            <a class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" title="Xem chi tiết">
                                <i class="fa fa-eye font-14"></i></a>

                        </td>
                        @endif 

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.full.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/bootstrap-duallistbox.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/jquery.bootstrap-duallistbox.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

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
    $(document).on('click', '.btn-plus', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/add-to-borrow/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // console.log(response.data);
                    let html = "";
                    let data = Object.values(response.data);
                    

                    data.map(item => {
                        // Create a table row for each item
                        html += `
                                <tr id="detail-${item.id}">
                                    <td><img src="${item.image}" alt="" style="width: 80px; height: 80px"></td>
                                    <td>${item.name}</td>
                                    <td>
                                        <a class="btn btn-default btn-xs m-r-5" data-id="${item.id}" title="Xem chi tiết">
                                            <i class="fa fa-eye font-14"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-trash" data-id="${item.id}" title="Xóa">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                    });
                    console.log(html);
                    
                    // Now you can append `html` to your table body or wherever you need to display it
                    document.getElementById('show_detail').innerHTML = html; // Replace 'yourTableBodyId' with the actual ID of your table body

                    $('#ifchua').hide();
                    // window.location.reload();
                    toastr.success(response.message);
                } else if (response.warning) {
                    toastr.warning(response.message);
                }
            },
            error: function() {
                alert('Đã xảy ra lỗi, vui lòng thử lại sau.');
            }
        });
    });
</script>
