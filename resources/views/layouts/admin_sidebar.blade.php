<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item ">
            <a class="nav-link {{ request()->is('admin/dashboard*') ? '' : 'collapsed' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Master</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? '' : 'collapsed' }}"
                href="{{ route('admin.users.index') }}">
                <i class="ri-list-check"></i>
                <span>Users</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/product*') ? '' : 'collapsed' }}"
                href="{{ route('admin.product.index') }}">
                <i class="ri-list-check"></i>
                <span>Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/category*') ? '' : 'collapsed' }}"
                href="{{ route('admin.category.index') }}">
                <i class="ri-list-check"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/sub-category*') ? '' : 'collapsed' }}"
                href="{{ route('admin.sub_category.index') }}">
                <i class="ri-list-check"></i>
                <span>Sub Categories</span>
            </a>
        </li>
        
        <li class="nav-heading">Settings</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-list-settings-fill"></i><span>Admin Settings</span>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ request()->is('admin/profile*') ? '' : 'collapsed' }}"
                        href="{{ route('admin.profile.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
