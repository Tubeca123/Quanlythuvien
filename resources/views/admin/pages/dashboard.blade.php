@extends('admin.master_layout')
@section('link')
<!-- <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endsection

@section('page_content')
<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <a href="{{route('borrow_new')}}">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ \App\Models\Borrow::where('status', 1)->count() }}</h2>
                        <div class="m-b-5">Phiếu mượn mới</div>
                        <i class="ti-bookmark-alt widget-stat-icon"></i>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6">
            <a href="{{route('borrowing')}}">
                <div class="ibox bg-info color-white widget-stat">

                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ \App\Models\Borrow::where('status', 2)->count() }}</h2>
                        <div class="m-b-5">Phiếu đang mượn</div><i class="ti-save widget-stat-icon"></i>

                    </div>

                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6">
            <a href="{{route('borrowing')}}">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ \App\Models\Borrow::where('status', 4)->count() }}</h2>
                        <div class="m-b-5">Phiếu muộn </div><i class="ti ti-time widget-stat-icon"></i>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{route('borrow_done')}}">
                <div class="ibox bg-teal color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ \App\Models\Borrow_return::count() }}</h2>
                        <div class="m-b-5">Phiếu trả</div><i class="ti-wallet widget-stat-icon"></i>

                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">

            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        <div>
                            <h3 class="m-0">Thống kê</h3>
                            <div></div>
                        </div>
                        <div class="d-inline-flex">
                            <div>
                                <label>
                                    <input type="radio" name="dataType" id="data1" checked> Thống kê theo tuần
                                </label>
                                <label>
                                    <input type="radio" name="dataType" id="data2"> Thống kê theo tháng
                                </label>
                                <label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                        <script>
                            var customLabels = ["T2", "T3", "T4", "T5", "T6", "T7", "CN"]
                            var data1 = @json($borrowByWeekDay).map(function(item) {
                                return item.borrow_count;
                            });

                            var chart = function(customLabels, data1) {
                                var a = {
                                        labels: customLabels,
                                        datasets: [{
                                            label: "Lượt Mượn",
                                            borderColor: 'rgba(52,152,219,1)',
                                            // backgroundColor: 'rgba(52,152,219,1)',
                                            pointBackgroundColor: 'rgba(52,152,219,1)',
                                            data: data1
                                        }]
                                    },
                                    t = {
                                        responsive: !0,
                                        maintainAspectRatio: !1
                                    },
                                    e = document.getElementById("bar_chart").getContext("2d");
                                new Chart(e, {
                                    type: "line",
                                    data: a,
                                    options: t
                                });
                            }
                            chart(customLabels, data1, data2)

                            document.getElementById("data1").addEventListener("click", function() {
                                customLabels = ["T2", "T3", "T4", "T5", "T6", "T7", "CN"]
                                var data1 = @json($borrowByWeekDay).map(function(item) {
                                    return item.borrow_count;
                                });
                                chart(customLabels, data1, data2)
                            });

                            document.getElementById("data2").addEventListener("click", function() {
                                customLabels = ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"]
                                var data1 = @json($borrowByMonth).map(function(item) {
                                    return item.borrow_month_count;
                                });
                                chart(customLabels, data1, data2)
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">

                <div class="ibox-body">
                    <div class="form-group" id="date_5">
                        <label class="font-normal">Tìm kiếm</label>
                        <form action="{{route('search_dashboard')}}" method="GET">
                            @csrf
                            <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon p-l-10 p-r-10">từ</span>
                                <input class="input-sm form-control" type="date" name="start" value="{{ request('start', date('Y-m-01')) }}">
                                <span class="input-group-addon p-l-10 p-r-10">đến</span>
                                <input class="input-sm form-control" type="date" name="end" value="{{ request('end', date('Y-m-d')) }}">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Thống kê</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                                const xValues = ["Sách tốt", "Sách hư hại", "Sách mất"];
                                const yValues = [@json($OkePercentage), @json($DamagePercentage), @json($diePercentage)];
                                const barColors = [
                                    "#3498db",
                                    "#f1c40f",
                                    "#E91E63"
                                ];
                                new Chart("myChart", {
                                    type: "doughnut",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        title: {
                                            display: true,
                                            text: "Tình trạng sách trả"
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Visitors Statistics</div>
                </div>
                <div class="ibox-body">
                    <div id="world-map" style="height: 300px;"></div>
                    <table class="table table-striped m-t-20 visitors-table">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Visits</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/us.png")}}" />USA
                                </td>
                                <td>755</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:52%; height:5px;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">52%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/Canada.png")}}" />Canada
                                </td>
                                <td>700</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:48%; height:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">48%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/India.png")}}" />India
                                </td>
                                <td>410</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:37%; height:5px;" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">37%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/Australia.png")}}" />Australia
                                </td>
                                <td>304</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:36%; height:5px;" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">36%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/Singapore.png")}}" />Singapore
                                </td>
                                <td>203</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar" role="progressbar" style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">35%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/uk.png")}}" />UK
                                </td>
                                <td>202</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">35%</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="m-r-10" src="{{asset("img/flags/UAE.png")}}" />UAE
                                </td>
                                <td>180</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:30%; height:5px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="progress-parcent">30%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tasks</div>
                    <div>
                        <a class="btn btn-info btn-sm" href="{{route("show_list_users")}}">New Task</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <ul class="list-group list-group-divider list-group-full tasks-list">
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Meeting with Eliza</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">10 July 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox" checked="">
                                    <span class="input-span"></span>
                                    <span class="task-title">Check your inbox</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">22 May 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Create Financial Report</span>
                                </label>
                                <span class="badge badge-danger m-l-5"><i class="ti-alarm-clock"></i> 1 hrs</span>
                            </div>
                            <div class="task-data"><small class="text-muted">No due date</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox" checked="">
                                    <span class="input-span"></span>
                                    <span class="task-title">Send message to Mick</span>
                                </label>
                            </div>
                            <div class="task-data"><small class="text-muted">04 Apr 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item task-item">
                            <div>
                                <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                    <input type="checkbox">
                                    <span class="input-span"></span>
                                    <span class="task-title">Create new page</span>
                                </label>
                                <span class="badge badge-success m-l-5">2 Days</span>
                            </div>
                            <div class="task-data"><small class="text-muted">07 Dec 2018</small></div>
                            <div class="task-actions">
                                <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Messages</div>
                </div>
                <div class="ibox-body">
                    <ul class="media-list media-list-divider m-0">
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="{{asset("img/users/u1.jpg")}}" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="{{asset("img/users/u2.jpg")}}" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="{{asset("img/users/u3.jpg")}}" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img class="img-circle" src="{{asset("img/users/u6.jpg")}}" width="40" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div cl ss="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Latest Orders</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th width="91px">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT2584</a>
                                </td>
                                <td>@Jack</td>
                                <td>$564.00</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT2575</a>
                                </td>
                                <td>@Amalia</td>
                                <td>$220.60</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT1204</a>
                                </td>
                                <td>@Emma</td>
                                <td>$760.00</td>
                                <td>
                                    <span class="badge badge-default">Pending</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT7578</a>
                                </td>
                                <td>@James</td>
                                <td>$87.60</td>
                                <td>
                                    <span class="badge badge-warning">Expired</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT0158</a>
                                </td>
                                <td>@Ava</td>
                                <td>$430.50</td>
                                <td>
                                    <span class="badge badge-default">Pending</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="invoice.html">AT0127</a>
                                </td>
                                <td>@Noah</td>
                                <td>$64.00</td>
                                <td>
                                    <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>10/07/2017</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Best Sellers</div>
                </div>
                <div class="ibox-body">
                    <ul class="media-list media-list-divider m-0">
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="{{asset("img/image.jpg")}}" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">Samsung</a>
                                    <span class="font-16 float-right">1200</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="{{asset("img/image.jpg")}}" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">iPhone</a>
                                    <span class="font-16 float-right">1150</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="{{asset("img/image.jpg")}}" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">iMac</a>
                                    <span class="font-16 float-right">800</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-img" href="javascript:;">
                                <img src="{{asset("img/image.jpg")}}" width="50px;" />
                            </a>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:;">apple Watch</a>
                                    <span class="font-16 float-right">705</span>
                                </div>
                                <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="ibox-footer text-center">
                    <a href="javascript:;">View All Products</a>
                </div>
            </div>
        </div>
    </div> -->

</div>

@endsection