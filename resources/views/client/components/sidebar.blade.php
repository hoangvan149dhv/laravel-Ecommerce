<!-- Sidebar -->
<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('admin.home') }}">
                <svg
                        class="brand-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid"
                        width="30"
                        height="33"
                        viewBox="0 0 30 33"
                >
                    <g fill="none" fill-rule="evenodd">
                        <path
                                class="logo-fill-blue"
                                fill="#7DBCFF"
                                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                        />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/>
                    </g>
                </svg>
                <span class="brand-name">Dashboard</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub">
                    <a class="sidenav-item-link" href="{{ route('admin.home') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="{{ route('admin.category.index') }}">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Danh mục sản phẩm</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="{{ route('admin.product.index') }}">
                        <i class="mdi mdi-checkbox-blank"></i>
                        <span class="nav-text">Sản phẩm</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
