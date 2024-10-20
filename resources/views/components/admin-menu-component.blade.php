<style>
.side-menu {
        list-style: none;
        padding-left: 0;
    }

    .side-menu > li {
        position: relative;
    }

    .side-menu > li > a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 15px;
        text-decoration: none;
        color: #fff;
        background-color: #2e4255;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    .side-menu > li > a:hover {
        background-color: #2e4255;
    }

    /* Icon mũi tên */
    .side-menu .fa-angle-left {
        transition: transform 0.3s;
    }

    /* Định dạng cho submenu */
    .nav-2-level {
        list-style: none;
        display: none;
        padding-left: 20px;
    }

    /* Hiển thị submenu khi hover vào mục cha */
    .menu-item-has-children:hover > .nav-2-level {
        display: block;
    }

    /* Hiệu ứng xoay mũi tên khi hover */
    .menu-item-has-children:hover > a .fa-angle-left {
        transform: rotate(90deg);
    }

    /* Định dạng cho các item trong submenu */
    .nav-2-level > li > a {
        display: block;
        padding: 8px 15px;
        text-decoration: none;
        color: #fff;
        background-color: #2e4255;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    .nav-2-level > li > a:hover {
        background-color: #3498db;
    }

    /* Định dạng chung cho các icon */
    .sidebar-item-icon {
        margin-right: 10px;
    }

    /* Thêm một chút khoảng cách cho mũi tên */
    .fa-angle-left {
        margin-left: auto;
    }
</style>
@php
    $topLevelMenus = $mnitems->where('Item_level', 1)->sortBy('Item_order');
@endphp
<ul class="side-menu metismenu">
    @foreach ($topLevelMenus as $item)
        @php
            $Pid = $item->Id;
            $subMenus = $mnitems->where('Parent_level', $Pid)->sortBy('Item_order');
            $countSubMenus = $subMenus->count();
        @endphp

        @if ($countSubMenus > 0)
            <li class="menu-item-has-children">
                <a href="#">
                    <i class="sidebar-item-icon {{ $item->Icon }}"></i>
                    <span class="nav-label">{{ $item->Name }}</span>
                </a>
                <ul class="nav-2-level">
                    @foreach ($subMenus as $submenu)
                        <li>
                            <a href="{{ route($submenu->Route) }}">{{ $submenu->Name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="{{ route($item->Route) }}">
                    <i class="sidebar-item-icon {{ $item->Icon }}"></i>
                    <span class="nav-label">{{ $item->Name }}</span>
                </a>
            </li>
        @endif
    @endforeach
</ul>
