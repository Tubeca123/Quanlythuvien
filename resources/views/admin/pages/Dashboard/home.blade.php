@extends('admin.master_layout')
@section('page_content')

<style>
                    .colors-boxes .color-box {
                        margin-bottom: 20px;
                        border: 1px solid #eee;
                    }

                    .color-box .color-view {
                        position: relative;
                        padding: 35px 10px;
                        text-align: center;
                        font-size: 18px;
                    }

                    .color-box .color-view span {
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        width: 100%;
                        text-align: center;
                        padding: 6px;
                        background-color: rgba(0, 0, 0, .2);
                        font-size: 12px;
                        color: #fff;
                    }

                    .color-box .color-name {
                        padding: 7px;
                        text-align: center;
                        font-weight: 600;
                    }

                    .color-box .color-name small {
                        display: block;
                        font-weight: 400;
                    }

                    .colors-tabs {
                        padding-top: 15px;
                        margin: 0;
                        border: 0;
                        display: block
                    }

                    .colors-tabs span {
                        display: inline-block;
                        height: 20px;
                        width: 20px;
                        margin-left: 15px;
                        cursor: pointer;
                        border: 0 !important;
                        padding: 0;
                    }

                    .color-palette {
                        padding: 10px 15px;
                        color: #fff;
                    }
                </style>
                
<div class="page-content fade-in-up">
                <div class="row">
                <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Main Colors list</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <div class="row">
                            <div class="col-sm-2 border border-secondary mx-2">
                                <a class="color-box">
                                    <div class="color-view ti-list fs-1 "  ></div>
                                    <div class="color-name ">Kho sách </div>
                                </a>
                            </div>
                            <div class="col-sm-2 border border-secondary mx-2">
                                <a class="color-box ">
                                    <div class="color-view ti-flag fs-1 "></div>
                                    <div class="color-name">Đặt trước </div>
                                </a>
                            </div>
                            <div class="col-sm-2 border border-secondary mx-2">
                                <a class="color-box">
                                    <div class="color-view ti-list fs-1 "  ></div>
                                    <div class="color-name ">Kho sách </div>
                                </a>
                            </div>
                            <div class="col-sm-2 border border-secondary mx-2">
                                <a class="color-box ">
                                    <div class="color-view ti-flag fs-1 "></div>
                                    <div class="color-name">Đặt trước </div>
                                </a>
                            </div> <div class="col-sm-2 border border-secondary mx-2">
                                <a class="color-box">
                                    <div class="color-view ti-list fs-1 "  ></div>
                                    <div class="color-name ">Kho sách </div>
                                </a>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
               
            </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12">
                    
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Default pills</div>
                        </div>
                        <div class="ibox-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pill-1-1" data-toggle="tab">First</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pill-1-2" data-toggle="tab">Second</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#pill-1-3" data-toggle="tab">Third tab</a>
                                        <a class="dropdown-item" href="#pill-1-4" data-toggle="tab">Fourth tab</a>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pill-1-1">As in the case of tabs available <code>.tabs-reversed</code> and <code>.tabs-below</code> classes. Lorem Ipsum heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
                                    tempor.</div>
                                <div class="tab-pane" id="pill-1-2">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</div>
                                <div class="tab-pane fade" id="pill-1-3">Third tab</div>
                                <div class="tab-pane fade" id="pill-1-4">Fourth tab</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
@endsection